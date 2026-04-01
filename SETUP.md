# Database Setup Instructions

## Step 1: Download Schema and Sample Data
1. Navigate to the repository's directory in your terminal.
2. Download the schema file by running:
   ```
   curl -O https://your.repo.url/schema.sql
   ```
3. Download the sample data file by running:
   ```
   curl -O https://your.repo.url/sample_data.sql
   ```

## Step 2: Import into MySQL
To import the downloaded SQL files into MySQL, follow these steps:

1. Open your terminal and log into MySQL by running:
   ```
   mysql -u your_username -p
   ```
2. Create a new database (if needed):
   ```
   CREATE DATABASE your_database_name;
   ```
3. Use the database you just created:
   ```
   USE your_database_name;
   ```
4. Import the schema:
   ```
   SOURCE path/to/schema.sql;
   ```
5. Import the sample data:
   ```
   SOURCE path/to/sample_data.sql;
   ```

## Step 3: Configure Localhost
1. Ensure that MySQL is running on your localhost.
2. Update your application's database connection settings to include:
   - Host: `localhost`
   - Username: `your_username`
   - Password: `your_password`
   - Database Name: `your_database_name`

3. Test the connection to ensure everything is set up correctly.

## Troubleshooting
- If you encounter errors during import, check that the SQL files are formatted correctly and that your MySQL server is running properly.
- Make sure your user has the necessary privileges to create databases and import data.