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
const fileInputs = [
    {
        fileInput: document.getElementById("post_image"),
        uploadText: document.getElementById("upload-text"),
        uploadSubtext: document.getElementById("upload-subtext"),
        dropArea: document.getElementById("drop-area"),
        loadingArea: document.getElementById("loading-area")
    },
    {
        fileInput: document.getElementById("new_image"),
        uploadText: document.getElementById("new-upload-text"),
        uploadSubtext: document.getElementById("new-upload-subtext"),
        dropArea: document.getElementById("new-drop-area"),
        loadingArea: document.getElementById("new-loading-area")
    }
];

// Function to simulate upload delay
const calculateUploadTime = (fileSize) => {
    const baseTime = 3000; // Default
    const sizeFactor = 500; // Additional
    const sizeInMB = fileSize / (1024 * 1024);
    return Math.max(baseTime, sizeInMB * sizeFactor);
};

// Function to handle file upload process
const handleFileUpload = (fileInput, uploadText, uploadSubtext, loadingArea, file) => {
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
};

// Add event listeners for each file input
fileInputs.forEach(({ fileInput, uploadText, uploadSubtext, dropArea, loadingArea }) => {
    // Handle file selection
    fileInput.addEventListener("change", (event) => {
        const file = event.target.files[0];
        handleFileUpload(fileInput, uploadText, uploadSubtext, loadingArea, file);
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
});
