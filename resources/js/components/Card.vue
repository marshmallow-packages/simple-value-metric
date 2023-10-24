<template>
    <Card class="relative flex flex-col px-6 py-4">
        <div class="flex items-center justify-between h-6 mb-4">
            <h3 class="mr-3 text-sm font-bold leading-tight">
                {{ card.title }}
            </h3>
            <div
                v-if="card.show_button && card.button_link && card.button_text"
                class="flex relative ml-auto w-[6rem] flex-shrink-0"
            >
                <a
                    :href="card.button_link"
                    :target="card.button_target"
                    class="w-full px-2.5 py-1.5 border-2 border-primary-300 shadow-sm text-xs font-medium rounded text-primary-500 bg-white hover:bg-primary-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500"
                    :class="card.button_class"
                >
                    <span class="block w-full text-center">
                        {{ card.button_text }}
                    </span>
                </a>
            </div>
        </div>
        <HelpTextTooltip
            v-if="card.helpText"
            :text="card.helpText"
            :width="card.helpWidth"
        />

        <p class="flex items-center mb-4 text-4xl">
            {{ card.formattedValue }}
            <span v-if="card.suffix" class="ml-2 text-sm font-bold text-80">
                {{ card.suffix }}
            </span>
        </p>
        <div class="flex items-center">
            <p class="font-bold text-80">
                <svg
                    v-if="card.footerIcon == 'Decrease'"
                    class="mr-2 fill-current text-danger"
                    width="20"
                    height="12"
                >
                    <path
                        d="M2 3a1 1 0 0 0-2 0v8a1 1 0 0 0 1 1h8a1 1 0 0 0 0-2H3.414L9 4.414l3.293 3.293a1 1 0 0 0 1.414 0l6-6A1 1 0 0 0 18.293.293L13 5.586 9.707 2.293a1 1 0 0 0-1.414 0L2 8.586V3z"
                    />
                </svg>
                <svg
                    v-if="card.footerIcon == 'Increase'"
                    class="mr-2 rotate-180 fill-current text-success"
                    width="20"
                    height="12"
                >
                    <path
                        d="M2 3a1 1 0 0 0-2 0v8a1 1 0 0 0 1 1h8a1 1 0 0 0 0-2H3.414L9 4.414l3.293 3.293a1 1 0 0 0 1.414 0l6-6A1 1 0 0 0 18.293.293L13 5.586 9.707 2.293a1 1 0 0 0-1.414 0L2 8.586V3z"
                    />
                </svg>

                <span>
                    <span v-html="card.footer"></span>
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
