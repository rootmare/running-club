<?php
include "includes/header.php"; 
include "database/config.php";


$orders = $conn->prepare("SELECT 
o.order_no,
o.paid,
o.date_paid,
o.quantity,
c.name,
s.name,
p.description
FROM orders o
INNER JOIN customers c ON o.fk_customer_no = c.customer_no
INNER JOIN salesperson s ON o.fk_employee_no = s.employee_no
INNER JOIN products p ON o.fk_product_code = p.product_code
");
$orders->execute();
$orders->store_result();
$orders->bind_result($orderNum, $paid, $datePaid, $qty, $custName, $empName, $product);
?>

<div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table class="min-w-full">
                    <thead class="border-b">
                        <tr>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">#</th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Paid</th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Date Paid</th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Customer Name</th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Employee Name</th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Product Name</th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Quanity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($orders->fetch()):
                        ?>
                        <tr class="border-b">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?php echo "$orderNum" ?></td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"><?php echo "$paid" ?></td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"><?php echo "$datePaid" ?></td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"><?php echo "$custName" ?></td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"><?php echo "$empName" ?></td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"><?php echo "$product" ?></td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"><?php echo "$qty" ?></td>
                        </tr>
                        <?php 
                        endwhile
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php 
include "includes/footer.php";
?>