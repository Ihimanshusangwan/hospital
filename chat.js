function insertText(btn) {
  let text = btn.innerHTML;
  const textarea = document.getElementById("msgBody");
  textarea.value = text;
}

document.addEventListener("DOMContentLoaded", () => {
  const chatIcon = document.getElementById("chatIcon");
  const chatContainer = document.getElementById("chatContainer");
  const sendBtn = document.getElementById("msgSendBtn");
  chatIcon.addEventListener("click", () => {
    chatContainer.style.display =
      chatContainer.style.display === "block" ? "none" : "block";
  });
  sendBtn.addEventListener("click", () => {
    sendBtn.disabled = true;
    const initialHtml = sendBtn.innerHTML;
    sendBtn.innerHTML = `<i class="fas fa-spinner fa-spin"></i>`;
    const checkboxes = document.querySelectorAll(
      'input[type="checkbox"].rec-check'
    );
    const checkedCheckboxes = [];
    checkboxes.forEach((checkbox) => {
      if (checkbox.checked) {
        checkedCheckboxes.push({
          rec_id: checkbox.getAttribute("rec_id"),
          rec_type: checkbox.getAttribute("rec_type"),
        });
      }
    });

    const msgBody = document.getElementById("msgBody").value;

    const dataToSend = {
      checkboxes: checkedCheckboxes,
      senderId: senderId,
      SenderName: senderName,
      SenderType: senderType,
      msgBody: msgBody,
    };
    const jsonData = JSON.stringify(dataToSend);
    const url = "../chat_send.php";
    fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: jsonData,
    })
      .then((response) => response.text())
      .then((responseText) => {
        sendBtn.innerHTML = initialHtml;
        document.getElementById("msgBody").value = "";
        sendBtn.disabled = false;
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  });
});
