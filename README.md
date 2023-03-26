# Display number of sales in the last week for WooCommerce
This snippet will display the total number of sales in the past week for WooCommerce. This snippet can be a little resource hungry, so it's best to limit it to more recent days. For very busy stores it is advised to reduce the number of days from a week to a few days.

The code snippet used dashicons to display a chart or badge depending ont he number of items sold. This can be changed to include an image of other icon set such as Fontawesome. It can be further modified by adding more conditional display rules to show different messages and icons. Remember, if you use Fontawesome or other font icon set they must be included in the head of your document

### File explanation 
Each of the files uses a unique function name, so using all three, while not encouraged, should not cause a fatal error.

1. functions.php: File is the default to show th enumber of items sold over the last week
2. functions-2.php: File is an alternative of the first file that shows the number of items sold over a custom period
3. functions-3.php: File is an alternartive to display fast selling items or popular selling items. If item sells xx in an hourly period it will display the total sold in the last hour. If the total sold in the last hour is below the defined threshold it will show th etotal sold in a week (or other defined period) if it meets the conditions
