<script setup lang="ts">
import type { HTMLAttributes } from 'vue'
import { reactiveOmit } from '@vueuse/core'
import { TabsTrigger, type TabsTriggerProps, useForwardProps } from 'reka-ui'
import { cn } from '@/lib/utils'

const props = defineProps<TabsTriggerProps & { class?: HTMLAttributes['class'] }>()

const delegatedProps = reactiveOmit(props, 'class')
const forwardedProps = useForwardProps(delegatedProps)
</script>

<template>
  <TabsTrigger data-slot="tabs-trigger" v-bind="forwardedProps" :class="cn(
    `bg-sky-500/25 data-[state=active]:bg-sky-500 data-[state=active]:text-white
  focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:outline-ring
  text-foreground inline-flex h-[calc(100%-1px)] flex-1 items-center justify-center gap-1.5
  rounded-md border border-transparent px-2 py-1 text-sm font-medium whitespace-nowrap
  transition-[color,box-shadow,background-color] focus-visible:ring-[3px]
  focus-visible:outline-1 disabled:pointer-events-none disabled:opacity-50
  data-[state=active]:shadow [&_svg]:pointer-events-none [&_svg]:shrink-0
  [&_svg:not([class*='size-'])]:size-4`,
    props.class,
  )">
    <slot />
  </TabsTrigger>
</template>
