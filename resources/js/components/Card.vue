<template>
    <Card class="flex flex-col items-center justify-center">
        <div class="flex mb-4">
            <h3 class="mr-3 text-base text-80 font-bold">
                {{ card.title }}
            </h3>
            <a
                v-if="card.show_button && card.button_link && card.button_text"
                :href="card.button_link"
                :target="card.button_target"
                style="position: absolute; top: 10px; right: 10px"
                :class="card.button_class"
            >
                {{ card.button_text }}
            </a>
            <div v-if="card.helpText" class="absolute pin-r pin-b p-2 z-50">
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
                        v-html="card.helpText"
                        :max-width="card.helpWidth"
                    />
                </tooltip>
            </div>
        </div>
        <p class="flex items-center text-4xl mb-4">
            {{ card.formattedValue }}
            <span v-if="card.suffix" class="ml-2 text-sm font-bold text-80">
                {{ card.suffix }}
            </span>
        </p>
        <div class="flex items-center">
            <p class="text-80 font-bold">
                <svg
                    v-if="card.footerIcon == 'Decrease'"
                    class="text-danger fill-current mr-2"
                    width="20"
                    height="12"
                >
                    <path
                        d="M2 3a1 1 0 0 0-2 0v8a1 1 0 0 0 1 1h8a1 1 0 0 0 0-2H3.414L9 4.414l3.293 3.293a1 1 0 0 0 1.414 0l6-6A1 1 0 0 0 18.293.293L13 5.586 9.707 2.293a1 1 0 0 0-1.414 0L2 8.586V3z"
                    />
                </svg>
                <svg
                    v-if="card.footerIcon == 'Increase'"
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
                        {{ card.footer }}
                    </span>
                </span>
            </p>
        </div>
    </Card>
</template>

<script>
    export default {
        props: ["card"],
    };
</script>
