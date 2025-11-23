// Debug script to check state-LGA functionality
console.log("=== State-LGA Debug Script Loaded ===");

document.addEventListener("DOMContentLoaded", () => {
    console.log("DOM Content Loaded");

    const stateSelect = document.querySelector(".select-state");
    const lgaSelect = document.querySelector(".select-lga");

    console.log("State Select:", stateSelect);
    console.log("LGA Select:", lgaSelect);

    if (stateSelect) {
        console.log("State Select ID:", stateSelect.id);
        console.log("State Select Classes:", stateSelect.className);
        console.log("State Select data-state:", stateSelect.dataset.state);

        stateSelect.addEventListener("change", (e) => {
            console.log("State Changed:", e.target.value);
            console.log(
                "Looking for LGA select with data-state:",
                e.target.dataset.state
            );
        });
    } else {
        console.error("State select not found!");
    }

    if (lgaSelect) {
        console.log("LGA Select ID:", lgaSelect.id);
        console.log("LGA Select Classes:", lgaSelect.className);
        console.log("LGA Select data-state:", lgaSelect.dataset.state);
    } else {
        console.error("LGA select not found!");
    }

    // Check if Livewire is loaded
    if (window.Livewire) {
        console.log("Livewire is loaded");
    } else {
        console.warn("Livewire is NOT loaded");
    }
});

document.addEventListener("livewire:updated", () => {
    console.log("Livewire Updated Event Fired");
});
