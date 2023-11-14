$(document).ready(function () {
    const teamList = [
        "Card Payment",
        "Digital Branch",
        "ATM Network",
        "Terminal Mgt"
    ];

    // Map of subcategories for each team
    const subcategories = {
        "Card Payment": ["Subcategory 1", "Subcategory 2", "Subcategory 3", "Subcategory 4","Subcategory 5", "Subcategory 6","Subcategory 7", "Subcategory 8", "Subcategory 9", "Subcategory 10"],
        "Digital Branch": ["Subcategory 1", "Subcategory 2", "Subcategory 3", "Subcategory 4","Subcategory 5", "Subcategory 6","Subcategory 7", "Subcategory 8", "Subcategory 9", "Subcategory 10"],
        "ATM Network": ["Subcategory 1", "Subcategory 2", "Subcategory 3", "Subcategory 4","Subcategory 5", "Subcategory 6","Subcategory 7", "Subcategory 8", "Subcategory 9", "Subcategory 10"],
        "Terminal Mgt": ["Subcategory 1", "Subcategory 2","Subcategory 3", "Subcategory 4","Subcategory 5", "Subcategory 6","Subcategory 7", "Subcategory 8", "Subcategory 9", "Subcategory 10"]
    };

    // Function to send initial welcome message
    function sendWelcomeMessage() {
        const welcomeMessage = "Hello, welcome! CMS's Team Contact Center. I am FTB Chatbot, how may I help you? (Please select an option here for a technical issue, or you can type to start chat:)";
        displayBotMessage(welcomeMessage);

        // Display clickable team members at the bottom
        const clickableTeamMembers = teamList.map((member, index) => {
            return `<button class="clickable-member" data-index="${index}">${member}</button>`;
        });
        const teamMembersHtml = clickableTeamMembers.join(' ');
        displayBotMessage(teamMembersHtml);
    }

    // Call the function to send the initial welcome message
    sendWelcomeMessage();

    // Handle click events for clickable team members
    $("#messageFormeight").on("click", ".clickable-member", function () {
        const memberIndex = $(this).data("index");
        const selectedMemberMessage = `You selected: ${teamList[memberIndex]}`;
        displayUserMessage(selectedMemberMessage); // Display user's message

        // Display subcategories for the selected team
        const subcategoryButtons = subcategories[teamList[memberIndex]].map((subcategory, index) => {
            return `<button class="clickable-subcategory" data-category="${teamList[memberIndex]}" data-subcategory="${subcategory}">${subcategory}</button>`;
        });
        const subcategoryButtonsHtml = subcategoryButtons.join(' ');
        displayBotMessage(subcategoryButtonsHtml);
    });

    // Handle click events for clickable subcategories
    $("#messageFormeight").on("click", ".clickable-subcategory", function () {
        const category = $(this).data("category");
        const subcategory = $(this).data("subcategory");
        const selectedSubcategoryMessage = `You selected: ${category} - ${subcategory}`;
        displayUserMessage(selectedSubcategoryMessage); // Display user's message

        // Simulate a bot response (replace this with actual bot logic or server communication)
        const botResponse = `Hello! How can I assist you with ${category} - ${subcategory}?`;
        displayBotMessage(botResponse);
    });

    // Function to display user's message
    function displayUserMessage(message) {
        var str_time = getTime();
        var userHtml =
            '<div class="cotainer_send"><div class="msg_cotainer_send">'
            + message + '<span class="msg_time_send">'
            + str_time
            + '</span></div><div class="img_cont_msg"><img src="http://localhost/template/Admin%20Dashboard/images/profile.jpg" class="rounded-circle user_img_msg"></div></div>';
        $("#messageFormeight").append(userHtml);
        $("#messageFormeight").scrollTop($("#messageFormeight")[0].scrollHeight);
    }

    // Function to display bot's message
    function displayBotMessage(message) {
        var str_time = getTime();
        var botHtml =
            '<div class="d-flex justify-content-start mb-4"><div class="img_cont_msg"><img src="http://localhost/template/Admin%20Dashboard/images/profile.jpg" class="rounded-circle user_img_msg"></div><div class="msg_cotainer">'
            + message + '<span class="msg_time">' + str_time + '</span></div></div>';

        $("#messageFormeight").append(botHtml);
        $("#messageFormeight").scrollTop($("#messageFormeight")[0].scrollHeight);
    }

    // Function to get the current time
    function getTime() {
        var now = new Date();
        var hours = ('0' + now.getHours()).slice(-2);
        var minutes = ('0' + now.getMinutes()).slice(-2);
        return hours + ":" + minutes;
    }

    function displayUserMessage(message) {
        var str_time = getTime();
        var userHtml =
            '<div class="cotainer_send"><div class="msg_cotainer_send">'
            + message + '<span class="msg_time_send">'
            + str_time
            + '</span></div><div class="img_cont_msg"><img src="http://localhost/template/Admin%20Dashboard/images/profile.jpg" class="rounded-circle user_img_msg"></div></div>';
        $("#messageFormeight").append(userHtml);
        $("#messageFormeight").scrollTop($("#messageFormeight")[0].scrollHeight);
    }
    function sendUserMessage(message) {
        $.ajax({
            type: "POST",
            url: "chatbot.php",
            data: { msg: message },
            success: function (response) {
                displayBotMessage(response);
            }
        });
    }
    function displayBotMessage(message) {
        var str_time = getTime();
        var botHtml =
            '<div class="d-flex justify-content-start mb-4"><div class="img_cont_msg"><img src="http://localhost/template/Admin%20Dashboard/images/profile.jpg" class="rounded-circle user_img_msg"></div><div class="msg_cotainer">'
            + message + '<span class="msg_time">' + str_time + '</span></div></div>';

        $("#messageFormeight").append(botHtml);
        $("#messageFormeight").scrollTop($("#messageFormeight")[0].scrollHeight);
    }
    function getTime() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        return hours + ":" + minutes;
    }
    $("#messageArea").on("submit", function (event) {
        event.preventDefault();
        const userMessage = $("#text").val();
        displayUserMessage(userMessage);
        sendUserMessage(userMessage);
        $("#text").val('');
    });

});