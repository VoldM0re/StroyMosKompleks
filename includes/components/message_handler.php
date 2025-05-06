<script>
    document.addEventListener('DOMContentLoaded', function() {
        <?php
        $message = $_SESSION['message'] ?? null;
        unset($_SESSION['message']); ?>
        <?php if ($message): ?>
            const message = <?= json_encode($message); ?>;
            messageIcon = message.type == 'error' ?
                `<svg class='message-icon' viewBox='0 0 13 13' fill='none' xmlns='http://www.w3.org/2000/svg' >
                        <path d='M4.34 9.5L6.5 7.34L8.66 9.5L9.49999 8.66L7.34 6.5L9.49999 4.34L8.66 3.5L6.5 5.66L4.34 3.5L3.5 4.34L5.66 6.5L3.5 8.66L4.34 9.5ZM6.5 12.5C5.67 12.5 4.89 12.3424 4.16 12.0272C3.43 11.712 2.795 11.2846 2.255 10.745C1.715 10.2054 1.2876 9.5704 0.972801 8.84C0.658001 8.1096 0.500401 7.3296 0.500001 6.5C0.499601 5.6704 0.657201 4.8904 0.972801 4.16C1.2884 3.4296 1.7158 2.7946 2.255 2.255C2.7942 1.7154 3.4292 1.288 4.16 0.9728C4.8908 0.6576 5.6708 0.5 6.5 0.5C7.3292 0.5 8.1092 0.6576 8.83999 0.9728C9.57079 1.288 10.2058 1.7154 10.745 2.255C11.2842 2.7946 11.7118 3.4296 12.0278 4.16C12.3438 4.8904 12.5012 5.6704 12.5 6.5C12.4988 7.3296 12.3412 8.1096 12.0272 8.84C11.7132 9.5704 11.2858 10.2054 10.745 10.745C10.2042 11.2846 9.56919 11.7122 8.83999 12.0278C8.1108 12.3434 7.3308 12.5008 6.5 12.5Z' fill='currentColor' />
                    </svg>` :
                `<svg class='message-icon' viewBox='0 0 13 13' fill='none' xmlns='http://www.w3.org/2000/svg'>
                        <path fill-rule='evenodd' clip-rule='evenodd' d='M6.5 12.5C7.28793 12.5 8.06815 12.3448 8.7961 12.0433C9.52405 11.7417 10.1855 11.2998 10.7426 10.7426C11.2998 10.1855 11.7417 9.52405 12.0433 8.7961C12.3448 8.06815 12.5 7.28793 12.5 6.5C12.5 5.71207 12.3448 4.93185 12.0433 4.2039C11.7417 3.47595 11.2998 2.81451 10.7426 2.25736C10.1855 1.70021 9.52405 1.25825 8.7961 0.956723C8.06815 0.655195 7.28793 0.5 6.5 0.5C4.9087 0.5 3.38258 1.13214 2.25736 2.25736C1.13214 3.38258 0.5 4.9087 0.5 6.5C0.5 8.0913 1.13214 9.61742 2.25736 10.7426C3.38258 11.8679 4.9087 12.5 6.5 12.5ZM6.34533 8.92667L9.67867 4.92667L8.65467 4.07333L5.788 7.51267L4.30467 6.02867L3.362 6.97133L5.362 8.97133L5.878 9.48733L6.34533 8.92667Z' fill='currentColor' />
                    </svg> `;

            const messageHTML = `
                <div class='message-block ${message.type}'>
                    <div class='message'>
                        ${messageIcon}
                        <p class='message-text'>${message.text}</p>
                    </div>
                </div> `;

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