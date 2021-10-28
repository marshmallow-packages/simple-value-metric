<template>
    <loading-card :loading="loading" class="px-6 py-4">
        <div class="flex mb-4">
            <h3 class="mr-3 text-base text-80 font-bold">
                {{ title }}
            </h3>

            <a
                v-if="show_button && button_link && button_text"
                :href="button_link"
                :target="button_target"
                style="position: absolute; top: 10px; right: 10px"
                :class="button_class"
            >
                {{ button_text }}
            </a>

            <div v-if="helpText" class="absolute pin-r pin-b p-2 z-50">
                <tooltip trigger="click">
                    <icon
                        type="help"
                        viewBox="0 0 17 17"
                        height="16"
                        width="16"
                        class="cursor-pointer text-60 -mb-1"
                    />

                    <tooltip-content
                        slot="content"
                        v-html="helpText"
                        :max-width="helpWidth"
                    />
                </tooltip>
            </div>
        </div>

        <p class="flex items-center text-4xl mb-4">
            {{ formattedValue }}
            <span v-if="suffix" class="ml-2 text-sm font-bold text-80">{{
                suffix
            }}</span>
        </p>

        <div class="flex items-center">
            <p class="text-80 font-bold">
                <svg
                    v-if="footerIcon == 'Decrease'"
                    class="text-danger fill-current mr-2"
                    width="20"
                    height="12"
                >
                    <path
                        d="M2 3a1 1 0 0 0-2 0v8a1 1 0 0 0 1 1h8a1 1 0 0 0 0-2H3.414L9 4.414l3.293 3.293a1 1 0 0 0 1.414 0l6-6A1 1 0 0 0 18.293.293L13 5.586 9.707 2.293a1 1 0 0 0-1.414 0L2 8.586V3z"
                    />
                </svg>
                <svg
                    v-if="footerIcon == 'Increase'"
                    class="rotate-180 text-success fill-current mr-2"
                    width="20"
                    height="12"
                >
                    <path
                        d="M2 3a1 1 0 0 0-2 0v8a1 1 0 0 0 1 1h8a1 1 0 0 0 0-2H3.414L9 4.414l3.293 3.293a1 1 0 0 0 1.414 0l6-6A1 1 0 0 0 18.293.293L13 5.586 9.707 2.293a1 1 0 0 0-1.414 0L2 8.586V3z"
                    />
                </svg>

                <span>
                    <span>
                        {{ footer }}
                    </span>
                </span>
            </p>
        </div>
    </loading-card>
</template>

<script>
    export default {
        props: {
            card: {
                type: Object,
                required: true,
            },
            loading: {
                default: true,
            },
        },

        data: () => ({
            loading: true,
        }),

        mounted() {
            this.title = this.card.title;
            this.helpText = this.card.helpText;
            this.footerIcon = this.card.footerIcon;
            this.footer = this.card.footer;
            this.suffix = this.card.suffix;
            this.helpWidth = this.card.helpWidth;
            this.formattedValue = this.card.formattedValue;
            this.button_link = this.card.button_link;
            this.button_text = this.card.button_text;
            this.button_target = this.card.button_target;
            this.button_class = this.card.button_class;
            this.show_button = this.card.show_button;

            console.log(this.show_button);

            this.loading = false;
        },
    };
</script>
