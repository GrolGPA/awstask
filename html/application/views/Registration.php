<p> For registration enter your name and password</p>
<form action="" method="post">
    <p>
        <label>Username</label>
        <input id="username" value="" name="username" type="text" required="required" />
        <br>
    </p>
    <p>
        <label>Password</label>
        <input id="password" value="" name="password" type="password" required="required" />
        <br>
    </p>
    <p>
        <label>Select category:</label>
        <select id="category" name="category" size="3">
            <option selected value="1">Father</option>
            <option value="2">Mother</option>
            <option value="3">Child</option>
        </select>
    </p>
    <br />
    <p>
        <button type="submit"><span>Registration</span></button>
        <button type="reset"><span>Reset</span></button>
    </p>
    <br>
    <a href="/Main">To the main page</a>
</form>