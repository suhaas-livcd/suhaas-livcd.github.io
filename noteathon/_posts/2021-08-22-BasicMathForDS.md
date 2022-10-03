---
layout: blog-post
title: "Basic-Math-For-DS"
slug: basic-math-for-ds
meta-title: Basic math for data science
meta-description: some math in bried
meta-image: https://www.svgrepo.com/show/418882/education-formula-math.svg
---

# DSML : Basic Math for Datascience

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

### Linear Algebra
- Vectors and Scalars
  - Scalar : they are just values that represent something.
  - Vector : list of numbers in tabular form that represent something.
- Operations
  - Vector addition : Dot product, which is the total work achieved or the displacement in qunatified form.
  - Scalar multiplication : when vector multiplied with constant, it either grows or reduces.
  - Project : P(V1/V2) proecting V1 over V2 is the shadow of the vector placed on the other. It helps to analyze feature of unknown vector.

- Matrices
  - They are just compostion of numbers of expression, where we convert them to Arrays and perform operation. Some computer graphics applications such as Scaling, Rotation, Shearing.
  
  - You can see below, how we converted an equation to a array form. 
      <img src="/noteathon/images/bmath_1.png" align="center" title="MainScreen">
  - Operations
    - Addition / Subtraction : Add the matrix of the same order (rows and cols).
    - Multiplication : can multiply if the cols of 1st Mat and rows of 2nd Mat match. Means 2*3 & 3*2 will result in 2 * 2 Mat.
    - Transpose : interchanging of rows and cols, helps you to change the dimension.
    - Determinant : is a scalar value, that helps you in knowing the sensitivity or depth of the data. It gives you the product of Eigen values of matrix.
      <img src="/noteathon/images/bmath_2.png" align="center" title="MainScreen">
  - As seen below, we can see Sx Sy as the scaling factor. M - shearing factor and rotation matrix.
      <img src="/noteathon/images/bmath_3.png" align="center" title="MainScreen">
  - Solving methods
    - Row Echelon Method : it uses Gaussian elimination to solve linear equation. Helps you identify some matrix properties such as Rank, Kernel, Inverse Matrix. Check this [link](https://deepai.org/machine-learning-glossary-and-terms/row-echelon-form#:~:text=The%20major%20application%20of%20row,given%20the%20coefficients%20becomes%20evident.)
    - Inverse Method : Another way to find the solution of the linear equation. To solve using inverse check this [link](https://www.cuemath.com/algebra/inverse-of-a-matrix/). Watch [video](https://www.youtube.com/watch?v=Re1F4d24Fxc) on how to solve equation to know more.
      A. A<sup>-1</sup> = I (identity matrix)
      A.X = C
      A<sup>-1</sup> A . X = A<sup>-1</sup> . C
      X = A<sup>-1</sup>C
  - Eigen Vectors
    - They dont change the direction or the state when the transformation is appliied.
    - Most sensitive part of the dataset, which can be used for analysis purpose.
    - As shown below, the vector V2 increased in same direction, but did change as V1.
    <img src="/noteathon/images/bmath_4.png" align="center" title="MainScreen">
  - Applicatons :
    - <img src="/noteathon/images/bmath_5.png" align="center" title="MainScreen">
    - to understand PCA check statquest [video](https://www.youtube.com/watch?v=HMOI_lkzW08)
  
  ### Multivariate calculus
    
- Notes

### References



## Next: [Algorithms](/noteathon/java-ds-algo)
