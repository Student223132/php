    <!-- Область основного контента -->
    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $subject = htmlspecialchars(trim($_POST['subject'] ?? ''), ENT_QUOTES, 'UTF-8');
            $body = htmlspecialchars(trim($_POST['body'] ?? ''), ENT_QUOTES, 'UTF-8');
    
            if (!empty($subject) && !empty($body)) {
                $to = 'korotaev.mix68@gmail.com';
                $headers = [
                    'From: admin@center.ogu',
                    'Reply-To: admin@center.ogu',
                    'X-Mailer: PHP/' . phpversion()
                ];

                $mail_sent = mail($to, $subject, $body, implode("\r\n", $headers));

                if ($mail_sent) {
                    echo "Ваше сообщение успешно отправлено!";
                }
                else {
                    echo "Сообщение не было отправлено.";
                }
            }
            else {
                echo "Пожалуйста, заполните все поля формы.";
            }
        }
        ?>
    <h3>Адрес</h3>
    <address>123456 Москва, Малый Американский переулок 21</address>
    <h3>Задайте вопрос</h3>
    <form action='' method='post'>
      <label>Тема письма: </label>
      <br>
      <input name='subject' type='text' size="50">
      <br>
      <label>Содержание: </label>
      <br>
      <textarea name='body' cols="50" rows="10"></textarea>
      <br>
      <br>
      <input type='submit' value='Отправить'>
    </form>
    <!-- Область основного контента -->