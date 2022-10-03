---
layout: blog-post
title: "Python-Crash-Course"
slug: python-crash-course
meta-title: Python Crash Course
meta-description: Python Crash Course
meta-image: https://upload.wikimedia.org/wikipedia/commons/thumb/c/c3/Python-logo-notext.svg/2048px-Python-logo-notext.svg.png
---

# Python : Python Crash Course

{% include toc.md %}

{% comment %} 
<!-- Not including since it is generated in the table TOC-->
Table of contents
=================

<!--ts-->
  <!-- + [Introduction](#introduction)
  + [keyterms](#keyterms) 
    * [complexity](#complexity)
    * [stable_unstable](#stable_unstable)
  + [data_structures](#ds)
    * [arrays](#arrays)
  + [algorithms](#sort-algorithms)
    + [sorting](#sort-algorithms)
      * [bubble_Sort](#bubble-sort)
  + [References](#references) -->
<!--te-->
{% endcomment %} 

##### Initial setup
- Is using anaconda then try using the below command as it will setup all the initial base required packages
  ``` 
  conda update conda
  conda update anaconda
  conda create -n python_udemy_course anaconda
   ```

   - [Update sypder](https://stackoverflow.com/questions/41849718/how-to-update-spyder-on-anaconda)

#### Python _ 1
- [What is subscriptable ? ](https://stackoverflow.com/questions/216972/what-does-it-mean-if-a-python-object-is-subscriptable-or-not)
 for e.g. list[1] is equivalent to mathematical notation, list<sub>subscript_1</sub> which would in turn call ``` list.__getitem__(1) ```
- Know different data types
- [Slicing and Indexing in depth different uses ](https://railsware.com/blog/python-for-machine-learning-indexing-and-slicing-for-lists-tuples-strings-and-other-sequential-types/#:~:text=One%20of%20the%20reasons%20it's,add%20its%20support%20as%20well.)

#### Python _ 2
- **List** []
  - Can support different datatypes, item assignment and deletion are possible 
  - **append** to add.
- **Tuples** ()
  - I dont know why they are used.
  - Once assigned stays fixed, can go for any item modification.
  - **Hashable** since they are immutable, e.g. in key value pair you want to use, which you might never.
- **Dictionary** {}
  - simple key:value pair, can be updated and added new keys.
  - *update*() to update or can directly add d[key] = value
- **Set** {}
  - **set**( iteratable type ) function to get the unique items
  - **add**(elem) to add
- Comparision Operators <= > != and or
  ```python
  print(True or False)
  print(True and False)
  print(1<2 and 2>3)
  print(1==1)

  if False:
    print('Perform some operation')
  elif 1 ==1 :
      print('my middle operation')
  else:
      print(' You are not True')
  ```
- **Loops** for, while
  - Use enumerate to get the idx in for loop
  ```python
  items = ['apple','bananna','mango','strawberry']
  for idx, item in enumerate(items, start=0):
      print(idx,",",item)
   # enumerate object yields pairs containing a count (from start, which defaults to zero) and a value yielded by the iterable argument
  enum_obj = enumerate(items) 
  var1, var2 = next(enum_obj) # unpacks tuple (0, seq[0])
  print(var1, var2)
  # List append
  out = [i**2 for i in range(10)] 
  ```

- **Functions**, lambdas, maps
  ```python
  print(list(map(my_func, seq1)))
  ## Convert to lambda
  print(list(map(lambda var: var**2, seq1)))
  ## To filter even numbers
  print(list(filter(lambda var : var%2==0, seq1)))
  ## Chek items present in list
  item in list # return True or False
  ## Tuple unpacking
  lst_tuple = [(1,3),(5,7),(9,11)]
  for i,j in lst_tuple:
      print(i,j)
  ## Use of ternary operators, if birthday then the bound can + 5
  def caught_speeding(speed, is_birthday):
    lowBound = 60 + ( 5 if is_birthday else 0)
    highBound = 80 + ( 5 if is_birthday else 0)
        
    if (speed <= lowBound):
        return "No ticket"
    elif (speed >lowBound and speed <=highBound):
        return "Small Ticket"
    else:
        return "Big Ticket"
  ```
#### Python _ 3 Numpy
- Setup
  ```python
  # conda install numpy
  # pip install numpy
  # conda list numpy
  # import numpy
  # numpy.__version__
  ```
- Flavours
  - Vector : strictly 1 D array
  - Matrix : 2-D but can have 1-D too.

- Array
  - single list : 
  - multi list : 
    ```python
    np.array([10,20]) # [10 20]
    np.array([[10,20], [30,40]]) # array([[10, 20],[30, 40]])
    # zero to 11 with step 2
    print(np.arange(0,11,2)) # [ 0  2  4  6  8 10]
    print(np.zeros(10)) #[0. 0. 0. 0. 0. 0. 0. 0. 0. 0.]
    print(np.ones((3,4))) # [[1. 1. 1. 1.] [1. 1. 1. 1.] 1. 1. 1. 1.]]
    # Difference btw arange and linspace, in arnage we specify the step size whereas in linspace we specify the number of elems we need in that range.
    print(np.linspace(0, 5, 10)) # [0.         0.55555556 1.11111111 1.66666667 2.22222222 2.77777778 3.33333333 3.88888889 4.44444444 5.        ]
    print(np.eye(4)) # identity matrix [[1. 0. 0. 0.] [0. 1. 0. 0.] [0. 0. 1. 0.] [0. 0. 0. 1.]]

    print(np.random.rand(5))
    print(np.random.rand(2,3)) # get 5 random nos [0.26320601 0.98699869 0.03921547 0.59362448 0.47860516]
    print(np.random.randn(6)) # normal distribution points
    # print rand int between range
    print(np.random.randint(0,4)) # can be 0,1,2,3
    # print 5 rand int between range
    print(np.random.randint(0,10,5)) # [2 5 2 2 5]
    # print 5 rand int between range
    arr = np.random.randint(0,20,10) # [2 5 2 2 5]
    print(arr)
    print(arr.reshape(2,5))

    """
    [13  0  9  6  3  6  6  5  3  4]
    [[13  0  9  6  3]
    [ 6  6  5  3  4]]
    """
    np.array(lst).min()
    np.array(lst).max()
    ## To know the idx
    np.array(lst).argmax()
    np.array(lst).argmin()
    # Shape to know the dims (rows, cols)
    reanr.shape # (2,5)
    # To know the datatype
    reanr.dtype # dtype('int64')

    # To make a new copy of the array and use separately, use .copy else only reference will be changed.
    arr1 = arr.copy()
    # Accessing array elements
    print(arr[0,2]) or print(arr[0][2])
    # To access all the rows from 0 - 2 and from column 1 
    print(arr[:2,1:])
    #  [[ 0  1  2  3  4  5  6  7  8  9]
    # [10 11 12 13 14 15 16 17 18 19]
    # [20 21 22 23 24 25 26 27 28 29]
    # [30 31 32 33 34 35 36 37 38 39]
    # [40 41 42 43 44 45 46 47 48 49]]
    # In the above arr to grab the array [[24 25] [34 35]]
    arr_2d = np.arange(50).reshape(5,10)

    print(arr_2d)
    print("")
    print(arr_2d[2:4,4:6])
    # To print the last column
    print(arr_2d[:,-1:])
    
    # To do the array boolean operations
    arr = np.arange(0,10)
    print(arr)
    # [0 1 2 3 4 5 6 7 8 9]
    arr = arr[arr > 5]
    print(arr)
    # [6 7 8 9]
    # To get the sum of all elements in the column
    arr_2d.sum(axis=0)

    ```

  - Operations
    - array with array
    ```python
    arr = np.arange(0,10)
    print(arr)
    # [0 1 2 3 4 5 6 7 8 9]
    print(arr + arr)
    # [ 0  2  4  6  8 10 12 14 16 18]
    print(arr * arr)
    # [ 0  1  4  9 16 25 36 49 64 81]
    print(arr / arr) # WARNING invalid value encountered in true_divide which give nan
    # [nan  1.  1.  1.  1.  1.  1.  1.  1.  1.]
    ```
    - scalar operations
     ```python
    print(arr ** 3)
    # [  0   1   8  27  64 125 216 343 512 729]
    ```
    - Universal array functions
      You can find the [link](https://docs.scipy.org/doc/numpy-1.9.3/reference/ufuncs.html#math-operations), which has all the various operations involved such as Math, Trignometric, Bitwise

     ```python
    print(np.sqrt(arr))
    # [0.         1.         1.41421356 1.73205081]
    print(np.max(arr))
    # 3
    ```
#### Python _ 4 Pandas
- Setup
  ```python
  # conda install pandas
  # pip install pandas
  ```
- Series
  ```python
  import numpy as np
  import pandas as pd
  labels = ['a','b','c']
  my_data = np.arange(0,3)
  ser1 = pd.Series(my_data, labels)
  print(ser1)
  # a    0
  # b    1
  # c    2
  # dtype: int64
  ser1 = pd.Series([1,2,3,4],index = ['USA', 'Germany','USSR', 'Japan'])                                   
  ser2 = pd.Series([1,2,5,4],index = ['USA', 'Germany','Italy', 'Japan'])
  print(ser1+ser2)
  # In the below if any value is not present, then will returnn NaN for that operation.
  # Germany    4.0
  # Italy      NaN
  # Japan      8.0
  # USA        2.0
  # USSR       NaN
  # dtype: float64

  ```

#### Useful commands
```shell
# To list envs in conda
conda info --envs

# To install pytorch
conda install pytorch torchvision torchaudio -c pytorch

```

- Notes
  - [AI ML Python frameworks](https://railsware.com/blog/best-libraries-and-tools-to-start-off-with-machine-learning-and-ai/)

### References



## Next: [Algorithms](/noteathon/java-ds-algo)
