<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <GuestLayout style='justify-content: initial;'>
        <Head title="Forgot Password" />

        <div class="mb-4 text-sm text-gray-600">
            <div>パスワードをお忘れですか？</div>
            新しいパスワードを設定するための手順をメールでお送りします。
            ご登録のメールアドレスを入力してください。
        </div>

        <div v-if="status" class="mb-4 font-medium text-sm block">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="メールアドレス" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autofocus
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <PrimaryButton class="inline my-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    パスワード再設定メールを送る
                </PrimaryButton>
                <Link
                    :href="route('login')"
                    class="block text-right underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    ログインはこちら
                </Link>
            </div>
        </form>
    </GuestLayout>
</template>
