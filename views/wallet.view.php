<?php require_once 'views/partials/top.php' ?>
<?php require_once 'views/partials/navbar.php' ?>

<div class="wallet-container">
    <h3 class="deposit-title">Deposit money to your account</h3>
    <form action="wallet.php?id=<?php echo $_SESSION['user']->id ?>" method="POST">
        <input class="deposit-input" type="number" name="deposit-amount" placeholder="Deposit amount" autocomplete="off" min="1" required>
        <input class="deposit-money-btn" type="submit" name="deposit-money-btn">
    </form>

    <?php if ($wallet->deposit_error == "false") : ?>
        <span class="deposit_sucess">Everything looks good. Money is transfered to your account.</span>
    <?php elseif ($wallet->deposit_error == "true") : ?>
        <span class="deposit_error">Oops! Something went wrong. Try again.</span>
    <?php endif; ?>

    <h3 class="deposit-title">Your balance informations</h3>
    <div class="wallet-balance">
        <p>Hi <?php echo explode(" ", $_SESSION['user']->fullname)[0] ?>, your total balance is</p>
        <h3><?php echo $wallet->getWallet($_SESSION['user']->id)->total_balance ?> €</h3>
    </div>

    <h3 class="transactions-title">Transaction</h3>

    <div class="transactions-container">
        <?php foreach ($transactions as $transaction) : ?>
            <?php if ($transaction->sender_id == $_GET['id'] && $transaction->reciever_id == $_GET['id']) : ?>
                <div class="money-recieved">
                    <div class="money-recieved-info">
                        <p class="recieved-from">Deposit</p>
                        <p class="recieved-at"><?php echo $transaction->created_at ?></p>
                    </div>
                    <p class="recieved-value">+ <?php echo $transaction->value; ?> €</p>
                </div>
            <?php elseif ($transaction->sender_id == $_GET['id']) : ?>
                <div class="money-sent">
                    <div class="money-sent-info">
                        <p class="sent-to"><?php echo $user->getUserById($transaction->reciever_id)->fullname; ?></p>
                        <p class="sent-at"><?php echo $transaction->created_at ?></p>
                    </div>
                    <p class="sent-value">- <?php echo $transaction->value; ?> €</p>
                </div>
            <?php elseif ($transaction->reciever_id == $_GET['id']) : ?>
                <div class="money-recieved">
                    <div class="money-recieved-info">
                        <p class="recieved-from"><?php echo $user->getUserById($transaction->sender_id)->fullname; ?></p>
                        <p class="recieved-at"><?php echo $transaction->created_at ?></p>
                    </div>
                    <p class="recieved-value">+ <?php echo $transaction->value; ?> €</p>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
        <?php if (count($transactions) == 0) : ?>
            <p>There are no known transactions.</p>
        <?php endif; ?>
    </div>
</div>

<?php require_once 'views/partials/bottom.php' ?>