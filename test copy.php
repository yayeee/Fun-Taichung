<script language="JavaScript" type="text/JavaScript">


function check(){
    p1 = document.form1.password.value;
    p2 = document.form1.confirmpassword.value;
    if ( p1.length > 7 && p1.length < 12 ) {
        document.getElementById('err').innerHTML="密碼長度ok";

        if ( p1 == p2 ) {
            document.getElementById('err').innerHTML="兩組密碼一致";
            return true;

        }else {
            document.getElementById('err').innerHTML="兩組密碼不一致";
            return false;
        }
    } else {
        document.getElementById('err').innerHTML="密碼設定至少 8 碼以上";
        return false;
    }
}


</SCRIPT>

<div id="err">...</div>

<form action="register.php" method="post" name="form1"
            style="line-height: 44px; letter-spacing: 0.06em;">
            <label>
                姓名 /暱稱 &nbsp;
                <input type="text"
                    id="name" name="name" />
            </label>
            <br />
            <label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                生日 &nbsp;
                <input type="text"
                    id="birthday" name="birthday"
                />
            </label>
            <br />
            <label>
                &nbsp;
                電子信箱 &nbsp;
                <input
                    type="email"
                    name="email"
                    placeholder=" 信箱將為您的登入帳號"
                    onChange={handleInputChange}
                />
            </label>
            <br />

            <?
                if ($_SESSION['signed'] == 1) {
                    echo '<p> ERR! 此帳號已被註冊 </p>';
                }
            ?>

            <label for="mobile">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                手機 &nbsp;
                <input type="tel" name="mobile" 
                    placeholder=" 09xxxxxxxx" />
            </label>
            <br />
            <label for="password">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                密碼 &nbsp;
                <input
                    type="password"
                    name="password"
                    placeholder=" 8-16碼英數字混合"
                    onChange="return check()"
                />
            </label>
            <br />
            <label for="confirmpassword">
                &nbsp;
                確認密碼 &nbsp;
                <input
                    type="password"
                    name="confirmpassword"
                    placeholder=" 請再次輸入您的密碼"
                    onChange="return check()"
                />
            </label>
            <br />
            <br />
            <button type="submit" value="Submit">註冊</button><br>
            <!-- <button style="background-color: white; color: rgb(43,49,63);
                font-weight: bold;" type="">登入</button> -->
</form>