<?php
/**
 * BC Math version https://www.php.net/manual/en/ref.bc.php
 * @param float $amount Monetary amount (up to 2 digit decimal) to convert to
 * minimum number of coins.
 * @return int Minimum number of coins needed to make up amount.
 */
function calcCoins($amount)
{
//    // Coin values expressed in pence or cents.
//    $denominations = array(200, 100, 50, 20, 10, 5, 2, 1);
//    // Convert to pennies or cents to avoid float comparison imprecision.
//    $remainder = $amount * 100;

    // Coin values expressed in pounds, dollars or euros etc.
    $denominations = array(2, 1, 0.5, 0.2, 0.1, 0.05, 0.02, 0.01);
    $remainder = $amount;
    $coins = 0;
    // Use 2 decimal places precision for BC Math library calls.
    bcscale(2);

    if ($remainder > 0) {
        foreach ($denominations as $denomination) {
            echo "Denomination: $denomination\n<br \>";
            echo "Remainder: $remainder\n<br \>";
            echo "\n<br \>";

//          if ($denomination <= $remainder) {
            if (bccomp($denomination, $remainder) <= 0) {
//              $denomCoins = floor($remainder / $denomination);
                $denomCoins = floor(bcdiv($remainder, $denomination));
                $coins += $denomCoins;
//              $remainder -= $denomCoins * $denomination;
                $remainder = bcsub($remainder, bcmul($denomCoins, $denomination));
                echo "Added denomination: $coins x $denomination\n<br \><br \>";
                break;  // Found largest denomination so quit search foreach.
            }
        }

        return ($coins + calcCoins($remainder));
    } else {
        return 0;   // Recursion terminating condition - fully converted, no remainder.
    }
}
// Test cases:
echo "Coins = " . calcCoins(0.3) . "\n<br /><br />";
echo "Coins = " . calcCoins(.04) . "\n<br /><br />";
echo "Coins = " . calcCoins(.01) . "\n<br /><br />";
echo "Coins = " . calcCoins(6) . "\n<br /><br />";
echo "Coins = " . calcCoins(6.01) . "\n<br /><br />";
echo "Coins = " . calcCoins(0) . "\n<br /><br />";
