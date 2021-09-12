---
layout: blog-post
title: "Py Excel Sheets Merger"
slug: Py-Excel-Sheet-Collage
meta-title: Py Excel Sheet Collage
meta-description: Merge multiple sheets to a single page
meta-image: /blog/images/blog_py_icn_pandas.svg
published: true
---

<img src="/blog/images/blog_py_icn_python.svg" align="center" title="MainScreen" width="100" height="100"> :link: <img src="/blog/images/blog_py_icn_excel.svg" align="center" title="MainScreen" width="100" height="100"> :link:  <img src="/blog/images/blog_py_icn_pandas.svg" align="center" title="MainScreen" width="100" height="100"> 

{% include toc.md %}

[![DEARSHELLY_GITHUB](https://img.shields.io/badge/<&nbsp;>&nbsp;Code-Github-black)](https://github.com/suhaas-livcd/PychieWorks/blob/master/ExcelSheetCollager/main/SheetCollager.py)

## What is it ?

This is simple script to merge the different excel sheets into a single file. It may not be much useful, but I had to design this for a friends an automation script to get all the data into a single file.

<img src="/blog/images/blog_py_merger_arch.svg" align="center" title="MainScreen">


## Pseudo Code

The requirement is to read each sheet data and merge into a sigle sheet.
**Step 1:** Import libraries and global variables
**Step 2:** Get no of sheets to read
**Step 3:** Read each sheet and append to variable
**Step 4:** Write the data to a new excel sheet

### Import library pandas and writer

``` python
import pandas as pd

# Global Variables
from pandas import ExcelWriter
```

### Define path and variables
``` python
excelFilePathIs = ""
sheetsFoundAre = []
sheetData = []
leave_rows_between_sheet_merging = 2
```

### Global var and path
``` python
def set_excel_path():
    global excelFilePathIs
    excelFilePathIs = "/home/suhaas/PycharmProjects/PychieWorks/ExcelSheetCollager/resources/TestSheetExceFormat.xlsx"
    print("Excel Path : ", excelFilePathIs)
```

### To get individual sheets

``` python
def get_all_sheet_names(df):
    global sheetsFoundAre
    sheetsFoundAre = df.sheet_names
    print(df.sheet_names)
```

### Read file and append to data variable
``` python
def read_excel_file():
    xls = pd.ExcelFile(excelFilePathIs)
    get_all_sheet_names(xls)
    print("Sheets found : ", len(sheetsFoundAre))
    global sheetData
    for eachSheet in sheetsFoundAre:
        sheetData.append(pd.read_excel(xls, eachSheet))
```

### Write the data to a new excel sheet
``` python
def write_sheet_data_to_excel():
    print("Creating a new Sheet : \'hello.xlsx\'")
    workbook = ExcelWriter('hello.xlsx')
    # worksheet = workbook.add_worksheet()
    print("Merging Sheets")
    __start_col = 0
    __start_row = 0
    for idx, eachSheetData in enumerate(sheetData):
        print("Writing : ", idx + 1, "/", len(sheetData))
        sheet_range = range(len(eachSheetData.index))
        print(sheet_range.start, " ", sheet_range.step, " ", sheet_range.stop)
        eachSheetData.to_excel(workbook, 'Sheet1', header=True, index=False,
                               startcol=__start_col, startrow=__start_row)
        __start_col = __start_col + sheet_range.start
        __start_row = __start_row + sheet_range.stop + leave_rows_between_sheet_merging
    workbook.close()
```

### Procedural execution

``` python
get_user_input()
set_excel_path()
read_excel_file()
write_sheet_data_to_excel()
```

## References
- [Pandas](https://pandas.pydata.org)