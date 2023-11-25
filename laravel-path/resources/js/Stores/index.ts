import { defineStore, acceptHMRUpdate } from 'pinia'
import { reactive, computed } from 'vue'

type State = {
    colorScheme: string
}

export const useStore = defineStore('Base', () => {
    // ++> State
    const state: State = reactive({
        colorScheme: "dark"
    });


    const resetState = () => {
        state.colorScheme = "dark";
    }

    // ++> Getters
    const colorScheme = computed(() => state.colorScheme);

    // ++> Actions
    const updateColorScheme = (mode: string) => {
        state.colorScheme = mode;
    }

    return {
        resetState,

        // ++> colorScheme
        colorScheme,
        updateColorScheme,
    }
})

if (import.meta.hot) {
    import.meta.hot.accept(acceptHMRUpdate(useStore, import.meta.hot))
}
