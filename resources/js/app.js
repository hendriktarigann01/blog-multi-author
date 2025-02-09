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
const previewArea = document.getElementById("preview-area");
const previewImage = document.getElementById("preview-image");

// Function to simulate upload delay
const calculateUploadTime = (fileSize) => {
    const baseTime = 3000;
    const sizeFactor = 500;
    const sizeInMB = fileSize / (1024 * 1024);
    return Math.max(baseTime, sizeInMB * sizeFactor);
};

fileInput.addEventListener("change", (event) => {
    const file = event.target.files[0];
    if (file) {
        uploadText.textContent = "";
        uploadSubtext.textContent = "";
        loadingArea.classList.remove("hidden");
        previewArea.classList.add("hidden");

        // Baca file sebagai URL
        const reader = new FileReader();
        reader.onload = function (e) {
            setTimeout(() => {
                loadingArea.classList.add("hidden");
                uploadText.textContent = file.name;
                uploadSubtext.textContent = "File uploaded successfully!";

                // Tampilkan pratinjau gambar
                previewImage.src = e.target.result;
                previewArea.classList.remove("hidden");
            }, calculateUploadTime(file.size));
        };
        reader.readAsDataURL(file);
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
        fileInput.files = event.dataTransfer.files;
        fileInput.dispatchEvent(new Event("change"));
    }
});
