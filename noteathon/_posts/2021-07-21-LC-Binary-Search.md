---
layout: blog-post
title: "LC-Binary-Search"
slug: lc-binary-search
meta-title: lc
meta-description: LC-Binary-Search
meta-image: https://raw.githubusercontent.com/LeetCode-OpenSource/vscode-leetcode/master/resources/LeetCode.png
published: true
---

# LC-Binary-Search

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

<!--flow-start
- Solve the code(Easy : 5 M, Med : 10 M, Hard : 15 M )
- Watch 2x S30, take complexity and all
- Optimize your solution
- Watch leetcode
- Write notes
- Move ONNNN! dont think of it more
flow-end-->

###### Search in Rotated Sorted Array
> The idea is that we add some additional condition checks in the normal binary search in order to better narrow down the scope of the search.

- if sorted part then just normal binary search else just check the range of the target where it lies.

```java
Complexity Analysis

Time complexity: O(logN).
Space complexity: O(1).
class Solution {
    public int search(int[] nums, int target) {
        int start = 0, end = nums.length-1;
        while(start<=end){
            int mid = start + (end-start)/2;
            boolean isLeftSorted = nums[start] <= nums[mid];
            if(nums[mid] == target){
                return mid;
            }else if(isLeftSorted){ // if left sorted then check if the target falls in that
                if(target >= nums[start] && target<= nums[mid]){
                    end = mid-1;
                }else{
                    start = mid +1;
                }
            }else{ // right sorted check if the target falls in that
                if(target <= nums[end] && target > nums[mid]){
                    start = mid +1;
                }else{
                    end = mid -1;
                }
            }
        }
        return -1;
    }
}
```

##### Search in a Sorted Array of Unknown Size

- Note : There are two operations here: to define search boundaries O(logT) and to perform binary search O(logT), which is overall O(logT).
```java
// Time complexity : O(logT), where T is an index of target value.
// Space complexity : O(1) since it's a constant space solution.

class Solution {
    public int search(ArrayReader reader, int target) {
        int outOfBounds  = (int) Math.pow(2,31)-1;
        // Base case 
        if(reader.get(1) == outOfBounds){
            return reader.get(0) == target ? 0 : -1;
        }
        
        int powIdx = 0;
        int l = 0, r=1;
        // Moving the left and right part to the range.
        while(target > reader.get(r)){
            l = r;
            r <<= 1; // left shift by 1 to increase pow of 2
        }

        // Now, normal binary search
        while(l<=r){
            int mid = l + (r-l)/2;
            //System.out.println(" mid  "+reader.get(mid));
            if(reader.get(mid) == target){
                return mid;
            }else if ( target > reader.get(mid)){
                l = mid+1;
            }else{
                r = mid-1;
            }
            
        }
            
        return -1;
        
    }
}
```

##### 34. Find First and Last Position of Element in Sorted Array
``` java
// Time complexity : O(log n), BS.
// Space complexity : O(1) just variables

class Solution {
    public int[] searchRange(int[] nums, int target) {
        
        // find the first Occurence
        int firstOcc = binarySearch(nums, 0,  nums.length-1, target, true);
        if(firstOcc == -1){
            return new int[]{-1,-1};
        }
        int seconOcc = binarySearch(nums, 0, nums.length-1, target, false);
        return new int[]{firstOcc, seconOcc};
    }
    
    
    public int binarySearch(int nums[], int l, int r, int target, boolean isFirst){
        while(l<=r){
            int mid = l + (r-l)/2;
            //System.out.println(" Hey : l,r,mid : "+l+","+r+","+mid);
            // continue further to check if it is first or last occurence
            if(nums[mid] == target){
                //System.out.println(" dsaf : l,r,mid : "+l+","+r+","+mid);
                if(isFirst){
                    // if mid reaches the boundary and the left elem != curr elem, that means we have foudn the first occurence
                    if(mid == l || nums[mid] != nums[mid-1]){
                        return mid;
                    }
                    r = mid -1;
                }else{
                    // if mid reaches the end boundary or the right elem != curr, then we have found the last occurence.
                    if(mid == r || nums[mid] != nums[mid+1]){
                        return mid;
                    }
                    l = mid+1;
                }
            }else if( target > nums[mid]){
                l = mid+1;
            }else{
                r = mid-1;
            }
        }
        return -1;
    }
}
```

##### 162. Find Peak Element
- Simply move towards the **inclination** part
```java
// Time complexity : O(log n), BS.
// Space complexity : O(1) just variables
class Solution {
    
    public int findPeakElement(int[] nums) {
        int l = 0, r = nums.length -1;
        while(l <= r){
            int mid = l + (r-l)/2;
            if(mid!=l && mid!=r){
                // checking peak elem condition
                if(nums[mid] > nums[mid-1] && nums[mid] > nums[mid+1]){
                    return mid;
                }
                
                // Move towards the highest peak
                if(nums[mid-1] > nums[mid]){
                    r = mid-1;
                }else {
                    l = mid+1;
                }
            }else{
                // reached end of l or r
                if(nums[l] > nums[r]){
                    return l;
                }else{
                    return r;
                }
            }
        }
        return -1;
    }
}
```


##### 74. Search a 2D Matrix
- The idea is to perform the binary search, by flattening a 2-D matrix.
- The main crux on flattening by using mid as idx and getting the row and the col ``` row = idx // n and col = idx % n```.

```java
//Time complexity : O(log(mn)) since it's a standard binary search.
// Space complexity : O(1).
class Solution {
    public boolean searchMatrix(int[][] matrix, int target) {
        // Checking if the matrix is not empty
        if (matrix.length > 0) {
            int rows = matrix.length;
            int col = matrix[0].length;
            int total_elems = rows * col;
            int start = 0, end = total_elems - 1;
            //System.out.println(" Total elems : "+end +" Rows : "+rows +" Col : "+col);
            while (start <= end) {
                int mid = start + (end - start) / 2;
                // Convert mid to the 2D array
                int row_idx = mid / col;
                int col_idx = mid % col;
                //System.out.println("val :  "+row_idx+","+col_idx +" - MID "+mid);
                int mid_val = matrix[row_idx][col_idx];
                //System.out.println(" MID VALUE : "+mid_val);
                if (target == mid_val) {
                    return true;
                } else if (target < mid_val) {
                    end = mid - 1;
                } else if (target > mid_val) {
                    start = mid + 1;
                }
            }
        }
        return false;
    }
}
```


##### 153. Find Minimum in Rotated Sorted Array
```java
// Time complexity : O(log(n))
// Space complexity : O(1).
class Solution {
    public int findMin(int[] nums) {
        int start = 0, end = nums.length-1;
        // if already sorted then return the start
        if(nums[0] <= nums[end]){
            return nums[start];
        }
        
        // if rotated
        while(start<=end){
            int mid = start + (end-start)/2;
            
            // Check the prev elem if it is gt than curr mid
            if(mid!=0 && nums[mid-1] > nums[mid]){
                return nums[mid];
            }
            
            // Compare the mid with end, to know the direction
            // this way you will determine which part is the sorted arr
            // So here, left part is sorted and the pivot is towards the right
            if(nums[mid] > nums[end]){
                start = mid+1;
            }else{
                // here, mid_num < end, so move towards left as the right part is sorted
                end = mid-1;
            }
        }
        return -1;
    }
}```

### References

## Next: [Algorithms](/noteathon/java-ds-algo)
