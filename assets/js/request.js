const messagesDiv = document.querySelector(".container .messages");
let userScrolledUp = false;

messagesDiv.addEventListener("scroll", () => {
	userScrolledUp =
		messagesDiv.scrollTop < messagesDiv.scrollHeight - messagesDiv.clientHeight;
});

document.addEventListener("DOMContentLoaded", () => {
	loadMessages();
	setInterval(loadMessages, 2500);
});

function loadMessages() {
	const url = "http://localhost/app/ChatController/loadMessages/";

	fetch(url, {
		method: "GET",
	})
		.then((response) => response.text())
		.then((data) => {
			const isUserAtBottom = !userScrolledUp;
			messagesDiv.innerHTML = data;

			if (isUserAtBottom) {
				messagesDiv.scrollTop = messagesDiv.scrollHeight;
			}
		})
		.catch((error) => {
			console.error(`Error while fetching messages. More details: ${error}`);
		});
}
