<script setup>
import { computed } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    status: String,
});

const form = useForm({});

const submit = () => {
    form.post(route('verification.send'));
};

const verificationLinkSent = computed(() => props.status === 'verification-link-sent');
</script>

<template>
    <GuestLayout style='justify-content: initial;'>
        <Head title="メールアドレス未認証|MemoShare" />

        <div class='text-center w-full h-70 p-6 mb-4'>
            <h1 class='font-bold text-xl m-2'>MemoShare</h1>
            <p class='text-sm'>メールアドレスの認証が済んでいません。</p>
            <p class='text-sm'>認証を行ってください。</p>
            <img :src="'/img/mail_not_confirm.png'" alt="start MemoShare" class="w-32 h-32 inline-block mt-6">
        </div>

        <div class="my-4 font-medium block text-center mb-12" v-if="verificationLinkSent">
            新しくメールを送りました
        </div>

        <form @submit.prevent="submit">
            <div style='margin-top: -30px;'>
                <PrimaryButton class="inline my-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    メールを再送する
                </PrimaryButton>

                <Link
                    :href="route('logout')"
                    method="post"
                    as="button"
                    class="block w-full text-right underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >ログアウトはこちら</Link
                >
            </div>
        </form>
    </GuestLayout>
</template>
