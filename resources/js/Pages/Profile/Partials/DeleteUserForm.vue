<script setup>
import DangerButton from '@/Components/DangerButton.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { nextTick, ref } from 'vue';

const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: '',
});

const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;

    nextTick(() => passwordInput.value.focus());
};

const deleteUser = () => {
    form.delete(route('profile.destroy'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingUserDeletion.value = false;

    form.reset();
};
</script>

<template>
    <section class="space-y-6">
        <header>
            <h2 class="text-lg font-medium text-gray-900">アカウントを削除する</h2>

            <p class="mt-1 text-sm text-gray-600">
                アカウントを削除するとデータは消去されもとに戻すことができませんのでご注意ください。
                <br>
                ※登録した全てのメモも消去されます。
            </p>
        </header>

        <DangerButton @click="confirmUserDeletion">アカウントを削除する</DangerButton>

        <Modal :show="confirmingUserDeletion" @close="closeModal">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">
                    本当にアカウントを削除しますか？
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    アカウントを削除するとデータは消去されもとに戻すことができませんのでご注意ください。
                    本当に削除する場合はパスワードを入力してください。
                </p>

                <div class="mt-6">
                    <InputLabel for="password" value="パスワード" class="sr-only" />

                    <TextInput
                        id="password"
                        ref="passwordInput"
                        v-model="form.password"
                        type="password"
                        class="mt-1 block w-full"
                        placeholder="1234abcd"
                        @keyup.enter="deleteUser"
                    />

                    <InputError :message="form.errors.password" class="mt-2" />
                </div>

                <div class="text-center">
                    <DangerButton
                        class="my-4"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="deleteUser"
                    >
                        アカウントを削除する
                    </DangerButton>
                    <SecondaryButton @click="closeModal"> キャンセルする </SecondaryButton>
                </div>
            </div>
        </Modal>
    </section>
</template>
