# File Uploader Project with PHP

This project is a simple file upload system implemented with PHP. Users can upload their files, and the files are saved in a folder named `file` in the root of the project. The project has various features, including file validation, file extension validation, and size restrictions.

## Features

- **File Validation:** Uploaded files are validated to ensure their correctness.
- **File Upload in `file` Folder:** All uploaded files are stored in a folder called `file` in the root directory of the project.
- **Unique File Names:** Each uploaded file's name is made unique using `md5` hashing of the time and the file name, preventing name conflicts.
- **File Size Limit:** Only files smaller than 5 MB are allowed to be uploaded.
- **File Extension Validation:** Only certain file extensions are allowed, such as `.jpg`, `.png`, `.pdf`, `.txt`, `.docx`, `.html`, and `.mp4`.

## Prerequisites

To run this project, you will need:
- PHP 7.x or higher
- A local server like XAMPP or WAMP (to run PHP locally)

## Usage

1. Download the project and place it in your local server directory.
2. Make sure the `file` folder exists in the root directory of the project. If it doesn't exist, create it.
3. Open the project in your browser.
4. Select the file you want to upload through the file upload form and submit it.

## Installation

1. Clone or download the repository:
   ```bash
   git clone https://github.com/AmirRiahi2008/uploader.git
