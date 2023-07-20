<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import TextInput from '@/Components/TextInput.vue';
import TextAreaInput from '@/Components/TextAreaInput.vue';
import Checkbox from '@/Components/Checkbox.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
    memo: Object,
});

const form = useForm({
    title: props.memo.title,
    content: props.memo.content,
    is_public: props.memo.is_public,
});

const submit = () => {
    const method = props.memo.id ? form.put : form.post;
    const routeName = props.memo.id ? 'memos.update' : 'memos.store';
    method.call(form, route(routeName, props.memo.id), {
        onFinish: () => form.reset()
    });
};

</script>

<template>
    <AuthenticatedLayout>
        <div class='m-auto my-8 main-area' style='max-width: 1216px;'>
            <Head title="「memo.title」の編集|MemoShare" />
            <form @submit.prevent="submit">
                <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">更新しました</p>
                </Transition>
                <TextInput
                    id="title"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.title"
                    required
                    autofocus
                />
                <InputError class="mt-2" :message="form.errors.title" />

                <TextAreaInput
                    id="content"
                    style="min-height: 200px;"
                    class="mt-1 block w-full"
                    v-model="form.content"
                    required
                />
                <InputError class="mt-2" :message="form.errors.content" />

                <div class="block mt-4">
                    <label class="flex items-center">
                        <Checkbox name="is_public" v-model:checked="form.is_public" />
                        <span class="ml-2 text-sm text-gray-600">全体に公開する</span>
                    </label>
                </div>

                <div class='text-right'>最終更新：{{ dayjs(props.memo.updated_at).format('YYYY/MM/DD') }}</div>
                <PrimaryButton class="inline my-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    {{ props.memo.id ? '更新' : '登録' }}する
                </PrimaryButton>
            </form>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import dayjs from "dayjs"
</script>>

<style>
    @media (max-width:1215px) { 
        .main-area {
            padding: 15px;
        }
     }
</style>