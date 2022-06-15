<template>
    <Card class="flex flex-col relative px-6 py-4">
        <div class="h-6 flex justify-between items-center mb-4">
            <h3 class="mr-3 leading-tight text-sm font-bold">
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
                    <span class="w-full block text-center">
                        {{ card.button_text }}
                    </span>
                </a>
            </div>
        </div>
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
