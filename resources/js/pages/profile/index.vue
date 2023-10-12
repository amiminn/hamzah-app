<template lang="">
    <main-page>
        <div class="grid grid-cols-2 gap-3">
            <div class="grid gap-3">
                <card>
                    <namecard>avatar</namecard>
                    <input type="file" class="form-input" @change="preview" />
                    <button class="btn btn-sky" @click="test">upd</button>
                </card>
                <card>
                    <namecard>password</namecard>
                </card>
            </div>
            <card>
                <namecard>informasi profile</namecard>
            </card>
        </div>
    </main-page>
</template>
<script>
import { Upload } from "upload-js";
export default {
    data() {
        return {
            isFile: {},
        };
    },
    methods: {
        up() {
            const upload = Upload({ apiKey: this.$key.uploadJs }); // Get production API keys from Bytescale

            const uploadFile = async (event) => {
                try {
                    const { fileUrl } = await upload.uploadFile(
                        event.target.files[0],
                        {
                            onProgress: ({ progress }) =>
                                console.log(`${progress}% complete`),
                        }
                    );
                    alert(`File uploaded!\n${fileUrl}`);
                } catch (e) {
                    alert(`Error!\n${e.message}`);
                }
            };
        },
    },
};
</script>
<style lang=""></style>
