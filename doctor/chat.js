function insertText(btn) {
  let text = btn.innerHTML;
  const textarea = document.getElementById("msgBody");
  textarea.value = text;
}
const chatIcon = document.getElementById("chatIcon");
const chatContainer = document.getElementById("chatContainer");
const sendBtn = document.getElementById("msgSendBtn");

chatIcon.addEventListener("click", () => {
  chatContainer.style.display =
    chatContainer.style.display === "block" ? "none" : "block";
});

document.addEventListener("DOMContentLoaded", () => {
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
        checkedCheckboxes.push(checkbox.getAttribute("rec_id"));
      }
    });

    const msgBody = document.getElementById("msgBody").value;
    const dataToSend = {
      checkboxes: checkedCheckboxes,
      dr_id: dr_id,
      msgBody: msgBody,
    };
    const jsonData = JSON.stringify(dataToSend);
    const url = "chat_send.php";
    fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: jsonData,
    })
      .then((response) => response.text())
      .then((responseText) => {
        if(responseText == "success"){
        sendBtn.innerHTML = initialHtml;
        document.getElementById("msgBody").value = "";
        sendBtn.innerHTML = initialHtml;
        sendBtn.disabled= false;
        }else{
         alert('Error sending message');
        }
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  });
});
