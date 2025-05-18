<script>
    document.addEventListener('DOMContentLoaded', function() {
        <?php
        $message = $_SESSION['message'] ?? null;
        unset($_SESSION['message']); ?>
        <?php if ($message): ?>
            const message = <?= json_encode($message); ?>;
            messageIcon = message.type == 'error' ?
                `<svg width="18" height="18" viewBox="0 0 13 13">
                    <use xlink:href="/assets/svg/message_sprite.svg#errorIcon"></use>
                </svg>` :
                `<svg width="18" height="18" viewBox="0 0 13 13">
                    <use xlink:href="/assets/svg/message_sprite.svg#successIcon"></use>
                </svg>`;

            const messageHTML = `
                <div class='message-block ${message.type}'>
                    <div class='message'>
                        ${messageIcon}
                        <p class='message-text'>${message.text}</p>
                    </div>
                </div>`;

            const mainElement = document.querySelector('main');
            mainElement.insertAdjacentHTML('afterbegin', messageHTML);
            const messageBlock = mainElement.querySelector('.message-block');

            messageBlock.classList.add('show');
            setTimeout(() => {
                messageBlock.classList.remove('show');
                setTimeout(() => {
                    mainElement.removeChild(messageBlock);
                }, 300);
            }, 4000);
        <?php endif; ?>
    });
</script>