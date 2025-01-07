# RxCare
                                                  Simplifying Pharmacy, Enriching Life

# Pharmacy-Management-System
Our primary goal is to make an interactive and user-friendly website for managing all the information at a pharmacy and lessen the workload of the worker and also the admin. We have used PHP for Back-End and MySQL for query. Also, we have implemented HTML5, CSS3 and Javascript for Front-End. We tried to add some dynamic features to make it more user-friendly. This report explores our project’s information about how we have implemented our knowledge of Database Management System to solve this problem. We tried our best to implement our knowledge of this course and our interest in website development in this project. 
Also, we tried to make these website’s code feasible and easy to understand for any developer to add further features.


# Starting the process.

## Installation and Setup

1. Download and Install [XAMPP](https://www.apachefriends.org/download.html)
2. Open XAMPP Control Panel and start Apache and MySQL.
3. Clone the repository to your system or download and extract the zipped folder.
4. Place the folder RxCare in *C:\xampp\htdocs*.
5. In web browser, open *localhost/phpmyadmin*.
6. Create a new database called 'RxCare_pharmacy' in phpmyadmin.

## Launch

1. After successfully importing, start the project by typing the following in the web browser:  *localhost/PHARMACY/mainpage.php*   
2. The Login Page for Admin opens up by default. Login as Admin by using:
    ```
    Username: adminCP
	Password: password   
    ```
3. For Pharmacist Login, refer to the 'emplogin' table in the database. 
    Example:
    ```
    Username: Chaman
	Password: UMC

                   Or
    
    Username: ProvaChaman
	Password: C.P.
    ```
## Frontend Development 

<b> User-centred Design/Development: </b>
The system prioritises usability, guaranteeing that both admin and pharmacists may easily access, view, and perform tasks with minimum instruction. By automating repetitive procedures and delivering clear, responsive graphics, RxCare considerably decreases the manual burden normally associated with pharmacy administration.

<b> Key Features of the Front-End design: </b>
1. Dashboard Overview:
The dashboard provides quick access to key operations such as materials management, transactions, staff details, customer data, and sales reports. Clear iconography and basic text labels are used to ensure straightforward navigation.
2. User-friendly Design:
Responsive design ensures seamless usage on PCs, tablets, and mobile devices. Flexible layout using latest CSS frameworks such as Bootstrap to improve responsiveness.
3. Specific Navigation for differents users or roles: 
Admin and Pharmacist interfaces are designed to their specific roles. Dropdown menus for grouped functionalities (such as "Materials," "Transactions," "Staffs," and "Customers") provide a clean and organised user experience.
4. Interactive Elements or Functional Integrations: 
Icons and buttons, such as "Add New Sale" and "View Sales Invoice Details," are appealing and engaging, making them easy to use. Dynamic methods are used for user activities, such as creating new records or seeing detailed reports. Search and filter functions are included in sites for faster data access. Additionally, the dropdown elements are incorporated using JS scripts, which adds dynamic navigation.
5. Color Scheme :
To boost readability, a professional colour palette was utilised, with contrasting highlights. Typography, spacing, and alignment help to maintain visual hierarchy and improve user focus.


