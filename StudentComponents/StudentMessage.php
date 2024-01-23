<style>
    @media screen and (max-width: 767px) {
        .sub-profiles {
      width: 80%;
      margin-top: 13%;
      margin-left: 14%;
      margin-right: 0;
    }
    }
</style>
    <div class="sub-profiles">
        <form action="https://getform.io/f/bd3ab969-0054-4c0d-a24a-603701b70d2a" method="POST">
        <h1>Message Us</h1>
                <form id="message-form">
                <label for="name">Name:</label>
                <input type="text" id="name" required>
                <label for="email">Student Number:</label>
                <input type="text" id="LRN" required>
                <label for="email">Email:</label>
                <input type="email" id="email" required>
                <label for="category">Year Level:</label>
                <select id="category" name="category">
                    <option value="Section">SHS 11</option>
                    <option value="Section">SHS 12</option>
                </select>
                <label for="reason" required>Concern:</label>
                <textarea id="message" required></textarea>
                <button type="submit">Send</button>
        </form>
    </div>