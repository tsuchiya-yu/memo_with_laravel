#!/usr/bin/env node
import { spawn } from "node:child_process";

const child = spawn(
  "npx",
  ["-y", "chrome-devtools-mcp@latest"],
  {
    stdio: ["pipe", "pipe", "inherit"], // stderrはそのまま表示
    env: process.env,
  }
);

// stdin はそのまま子に流す
process.stdin.pipe(child.stdin);

// stdout は「最初に来る注意文」を捨ててから流す
let unlocked = false;
let buffer = "";

child.stdout.on("data", (chunk) => {
  const s = chunk.toString("utf8");
  if (unlocked) {
    process.stdout.write(chunk);
    return;
  }

  buffer += s;

  // JSON-RPCっぽい “{” が来たら、その位置以降だけ流す
  const i = buffer.indexOf("{");
  if (i !== -1) {
    unlocked = true;
    const rest = buffer.slice(i);
    process.stdout.write(rest);
    buffer = "";
  } else {
    // まだ注意文だけの間は捨てる
    // bufferは無限に貯めない（念のため）
    if (buffer.length > 4096) buffer = buffer.slice(-4096);
  }
});

child.on("exit", (code) => process.exit(code ?? 1));
child.on("error", () => process.exit(1));
