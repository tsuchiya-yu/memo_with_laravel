<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <GuestLayout style='justify-content: initial;'>
        <Head title="トップページ|MemoShare" />
        <div style='display: flex;justify-content: center;align-items: center;'>
            <div>
                <div class='text-center w-full rounded-b-2xl p-6 pb-0'>
                    <h1 class='font-bold text-xl m-2'>MemoShare</h1>
                    <p class='text-sm'>パソコンで書いたメモをスマホで確認</p>
                    <p class='text-sm'>自分で書いたメモを他の人と共有</p>
                    <img :src="'/img/top_img.png'" alt="start MemoShare" class="w-32 h-32 inline-block mt-4">
                </div>
                <div>
                    <Link
                        :href="route('register')"
                        class="block text-right text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        <PrimaryButton class="inline my-4">
                            会員登録はこちら
                        </PrimaryButton>
                    </Link>
                    <Link
                        :href="route('login')"
                        class="block text-right underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        ログインはこちら
                    </Link>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
