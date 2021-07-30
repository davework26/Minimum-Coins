<?php
/**
 * Calculate the minimum number of coins needed to satisfy an amount.
 * @param float $amount Monetary amount (up to 2 digit decimal) to convert to
 * minimum number of coins.
 * @return int Minimum number of coins needed to make up amount.
 */
function calcCoins($amount)
{
    // Coin values expressed in pence or cents.
    $denominations = array(200, 100, 50, 20, 10, 5, 2, 1);
    // Convert to pennies or cents to avoid float comparison imprecision.
    $remainder = $amount * 100;
    $coins = 0;

    if ($remainder > 0) {
        $denomination = findLargestDenominationInAmount($denominations, $remainder);

        echo "Denomination: $denomination\n<br \>";
        echo "Remainder: $remainder\n<br \>";
        echo "\n<br \>";
        $coins += intdiv($remainder, $denomination);
        $remainder = $remainder % $denomination;
        echo "Added denomination: $coins x $denomination\n<br \><br \>";

        return ($coins + calcCoins($remainder / 100));
    } else {
        return 0;   // Recursion terminating condition - fully converted, no remainder.
    }
}

/**
 * Find the largest denomination that fits in the amount.
 * E.g. 50 is the largest denomination that fits in the amount 52.
 * @param array $denominations denominations.
 * @param int $amount
 * @return int the largest denomination in the amount.
 */
function findLargestDenominationInAmount($denominations, $amount)
{
    $largestDenom = 1;

    foreach ($denominations as $denomination) {
        if ($amount >= $denomination) {
            $largestDenom = $denomination;
            break;
        }
    }

    return $largestDenom;
}

// Test cases:
echo "Coins = " . calcCoins(0.3) . "\n<br /><br />";
echo "Coins = " . calcCoins(.04) . "\n<br /><br />";
echo "Coins = " . calcCoins(.01) . "\n<br /><br />";
echo "Coins = " . calcCoins(6) . "\n<br /><br />";
echo "Coins = " . calcCoins(6.01) . "\n<br /><br />";
echo "Coins = " . calcCoins(0) . "\n<br /><br />";
