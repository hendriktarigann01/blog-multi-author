import "./bootstrap";
import "@fortawesome/fontawesome-free/js/fontawesome";
import "@fortawesome/fontawesome-free/js/solid";

/* Navigation Mobile */
document.addEventListener("DOMContentLoaded", () => {
    const menuIcon = document.getElementById("menu-icon");
    const closeIcon = document.getElementById("close-icon");
    const navigation = document.getElementById("navigation");

    // Handle open menu
    menuIcon.addEventListener("click", () => {
        menuIcon.classList.add("hidden");
        closeIcon.classList.remove("hidden");
        navigation.classList.add("visible");
        navigation.classList.remove("hidden");
    });

    // Handle close menu
    closeIcon.addEventListener("click", () => {
        closeIcon.classList.add("hidden");
        menuIcon.classList.remove("hidden");
        navigation.classList.remove("visible");
        navigation.classList.add("hidden");
    });
});

/* Handle Drag & Drop Create Post */
const fileInput = document.getElementById("post_image");
const uploadText = document.getElementById("upload-text");
const uploadSubtext = document.getElementById("upload-subtext");
const dropArea = document.getElementById("drop-area");
const loadingArea = document.getElementById("loading-area");

// Function to simulate upload delay
const calculateUploadTime = (fileSize) => {
    const baseTime = 3000; // Default
    const sizeFactor = 500; // Additional
    const sizeInMB = fileSize / (1024 * 1024);
    return Math.max(baseTime, sizeInMB * sizeFactor);
};

// Update text and show animation when file is selected
fileInput.addEventListener("change", (event) => {
    const file = event.target.files[0];
    if (file) {
        uploadText.textContent = "";
        uploadSubtext.textContent = "";
        loadingArea.classList.remove("hidden");

        // Calculate upload time
        const uploadTime = calculateUploadTime(file.size);

        // Simulate upload process
        setTimeout(() => {
            // Hide loading animation
            loadingArea.classList.add("hidden");

            // Update text with file name
            uploadText.textContent = file.name;
            uploadSubtext.textContent = "File uploaded successfully!";
        }, uploadTime);
    }
});

// Handle drag-and-drop
dropArea.addEventListener("dragover", (event) => {
    event.preventDefault();
    dropArea.classList.add("bg-[#d5d2cf]");
});

dropArea.addEventListener("dragleave", () => {
    dropArea.classList.remove("bg-[#d5d2cf]");
});

dropArea.addEventListener("drop", (event) => {
    event.preventDefault();
    dropArea.classList.remove("bg-[#d5d2cf]");
    const file = event.dataTransfer.files[0];
    if (file) {
        fileInput.files = event.dataTransfer.files; // Assign file to input
        fileInput.dispatchEvent(new Event("change")); // Trigger change event
    }
});
