
const send_image = document.querySelector(".typing-area .image");
const image = document.querySelector(".typing-area .upload_img");
const form = document.querySelector(".typing-area"),
incoming_id = form.querySelector(".incoming_id").value,
sendBtn = form.querySelector(".send_btn"),
inputField = form.querySelector(".input-field"),
chatBox = document.querySelector(".chat-box");

send_image.onclick = () => {
    image.click(); // Trigger image input
};

form.onsubmit = (e) => {
    e.preventDefault(); // Prevent form submission
};

inputField.focus();
inputField.onkeyup = () => {
    if(inputField.value != "") {
        sendBtn.classList.add("active"); // Enable send button
    } else {
        sendBtn.classList.remove("active");
    }
};

image.oninput = () => {
    if(image.value != "") {
        sendBtn.classList.add("active"); // Enable send button when image is selected
    } else {
        sendBtn.classList.remove("active");
    }
};

sendBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert_chat.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                inputField.value = "";  // Clear input
                image.value = "";  // Clear image input
                scrollBottom();  // Scroll to bottom after sending
                sendBtn.classList.remove("active");  // Disable send button
            }
        }
    };
    let formData = new FormData(form); // Create form data with input fields
    xhr.send(formData); // Send form data (including image)
};

chatBox.onmouseenter = () => {
    chatBox.classList.add("active"); // Add class for chat box hover
};
chatBox.onmouseleave = () => {
    chatBox.classList.remove("active"); // Remove class when hover ends
};

setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get_chat.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                chatBox.innerHTML = data;
                if(!chatBox.classList.contains("active")) {
                    scrollBottom();
                }
            }
        }
    };
    xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    xhr.send("incoming_id=" + incoming_id);
}, 500);

function scrollBottom() {
    chatBox.scrollTop = chatBox.scrollHeight;
}
