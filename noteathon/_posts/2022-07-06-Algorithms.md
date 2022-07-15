---
layout: blog-post
title: "Algorithms"
slug: Algorithms
meta-title: My understanding
meta-description: Learning algorithms
meta-image: https://images.unsplash.com/photo-1608499337372-2fea1e07da37?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8N3x8YWxnb3JpdGhtc3xlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60
---

# Algorithms - My learning

{% include toc.md %}

### Dynamic programming
- DP is enhanced **recursion** (which calls 2 functions), where each functions inturn are **overlapping**. WHY 2 FUNCTIONS ? if it is skewed - - -  then, no overlapping problems.
- Another important thing is CHOICE, you would have choice in choosing the function.
- Next is getting the optimal output.

- How to identify a DP problem ?
    - Check if there is **choice** (whether you want to put in knapsack or not)
    - Check whether you have to find **optimal** (get max profit)

- Bottom Up vs Top-Down
    - Stack : Excessive recursive calls may lead to the stack overflow error, which would be avoided in the bottom up solution case. But this happens rarely (e.g. Scrambled String which comes under MCM topic)

#### 1. Knapsack - 0|1
- Fractional Knapsack (Greedy) : When you can fill the bag by using the fraction of the item
- 0/1 : So item as a whole (1) or nothing (0). Supply is only 1.
- Unbounded Knapsack : When the supply is unlimited, you can keep putting till the limit is reached. Multiple occurrence of same item are allowed.
- Here there are two properties for each item (Not that all problems have these properties, some might have just weight)
    - Value which would sum for profit
    - Weight
- Clue to identify knapsack : given items, **choice** to whether include or not an item; and getting the max **weight**.

<img src="/noteathon/algo_dp_kpsack01_choice.svg" align="center" title="MainScreen">

- ##### 1.1 0-1 Knapsack
    - Google Docs Code
        - [Top Down Code](https://docs.google.com/document/d/1Gz89n47BU_-KDU-Hh45v2VqbNUBXpfsFIIivQa6bfWo/edit#heading=h.qcridfslnts0)
        - [Bottom up approach](https://docs.google.com/document/d/1Gz89n47BU_-KDU-Hh45v2VqbNUBXpfsFIIivQa6bfWo/edit#heading=h.8mlv8srpi00a)

- ##### 1.2 Subset Sum
    - Question here is given the arr : {2,3,7,8,10}, check whether the sum of 11 is possible or not ?
    - When compared to the previous problem, the **Weight** arr is not given, so we can omit it.
    - Next observation is the **Max Values**, instead of max value it is Possible Subset. So, Max of numbers replace with True or False.
    - [Bottom Up code](https://docs.google.com/document/d/1Gz89n47BU_-KDU-Hh45v2VqbNUBXpfsFIIivQa6bfWo/edit#heading=h.7r6x0xlkpjpc)
- ##### 1.3 Equal Sum
    - Question here is give the arr : {1,5,5,11}, check whether the two subset exists with sum 11. In this it exists, Sub1{1,5,5} and Sub2{11}
    - Pattern the core logic : Odd/Even. If the sum of the whole subset is 22 then only you can **divide** and create two partitions. If the sum was 23, then in no way you can divide the sum.
    - To find the Subset Sum exists, just have to check the half the sum, because the other half would be present in the array anyways.
    - Pseudo Code
       ```java
       if isEven(arr_sum)
            return (SubsetSum(sumOfArr/2))
        else
            return false
       ```
- ##### 1.4 Count of Subset Sum
- ##### 1.5 Min subset sum diff
- ##### 1.6 Target Sum
- ##### 1.7 No of subset given diff

#### 2. Knapsack - Unbounded
In an unbounded knapsack, the items in the value reduce only if they are **processed**, else they can be added again to the sack. 
<img src="/noteathon/images/algo_dp_kpsack02_unbounded.svg" align="center" title="MainScreen">

- ##### 2.1 Unbounded Knapsack
- ##### 2.2 Rod Cutting
- ##### 2.3 Coin Change I
- ##### 2.4 Coin Change II
- ##### 2.5 Maximum Ribbon Cut

#### 3. LCS
There are total of 14 problems. **Palindrome** questions are subset of LCS. Try to do the pattern matching in identifying the questions based on the Question similarity, Inputs and outputs. Check if they are asking **optimal** anything in terms of quantitative. 

##### 3.1 Longest common Subsequence

- Recursive

``` java
    /* Returns length of LCS for X[0..m-1], Y[0..n-1] */
    int lcs(char[] X, char[] Y, int m, int n)
    {
        if (m == 0 || n == 0)
            return 0;
        if (X[m - 1] == Y[n - 1])
            return 1 + lcs(X, Y, m - 1, n - 1);
        else
            return max(lcs(X, Y, m, n - 1), lcs(X, Y, m - 1, n));
    }
```

- Bottom Up

```java
/* Returns length of LCS for X[0..m-1], Y[0..n-1] */
    int lcs(char[] X, char[] Y, int m, int n)
    {
        int L[][] = new int[m + 1][n + 1];

        /* Following steps build L[m+1][n+1] in bottom up fashion. Note
        that L[i][j] contains length of LCS of X[0..i-1] and Y[0..j-1] */
        for (int i = 0; i <= m; i++) {
            for (int j = 0; j <= n; j++) {
                if (i == 0 || j == 0)
                    L[i][j] = 0;
                else if (X[i - 1] == Y[j - 1])
                    L[i][j] = L[i - 1][j - 1] + 1;
                else
                    L[i][j] = max(L[i - 1][j], L[i][j - 1]);
            }
        }
        return L[m][n];
    }
```

##### 3.2 Longest common Substring
 - Check thread on [Leetcode](https://leetcode.com/discuss/interview-question/1273766/longest-common-substring)

```
Similar to Longest Common Subsequence LCS :
If characters are equal : dp[i][j]=1 + dp[i-1][j-1]
else dp[i][j]=0 // this is the only change
```
``` java
    public int  lgstComnSubstrDP(String str1, String str2){
        int m = str1.length();
        int n = str2.length();
        int maxLen = 0;
        int[][] dp = new int[m+1][n+1];

        for(int i = 0; i<=m; i++){
            for(int j = 0; j<=n; j++){
                if(i == 0 || j == 0)
                    dp[i][j] = 0;
                else if(str1.charAt(i-1) == str2.charAt(j-1))
                    dp[i][j] = 1+dp[i-1][j-1];
                else
                    dp[i][j] = 0;
                maxLen= Math.max(dp[i][j], maxLen);
            }
        }

        return maxLen;
    }
```

##### 3.3 Printing LC Subsequence and String
- To print it, you should observe the dp matrix that is generated. As, shown int the below image, we are following a **pattern**.


    <img src="https://www.tutorialspoint.com/design_and_analysis_of_algorithms/images/lcs.jpg" align="center" title="MainScreen">

``` java
if weights_equal
    add_char_to_word()
else
    move_towards_directionOf_Max(top, left)
```

``` java
    string ans;
    int i = m, j = n;
    while(i > 0 && j > 0)
    {
        // If current character in both the strings are same, then current character is part of LCS
        if(str1[i - 1] == str2[j - 1])
        {
            ans.push_back(str1[i-1]);
            i--;
            j--;
        }
        // If current character in X and Y are different & we are moving leftwards
        else if(dp[i - 1][j] > dp[i][j - 1])
        {
            j--;
        }
        // If current character in X and Y are different & we are moving upwards
        else
        {
            i--;
        }
        
    }
    reverse(ans.begin(), ans.end());
```

##### 3.4 Shortest common supersequence
    Part 1 : Shortest common SuperSequence
    - [Leetcode](https://leetcode.com/problems/shortest-common-supersequence/)

    - Length of the shortest supersequence = (Sum of lengths of given two strings)  - (Length of LCS of two given strings)

    Part 2 : Print Shortest common SuperSequence
    - Just traversal towards the **MAX** dp element direction till one of the idx reaches 0.
    - [LeetCode](https://leetcode.com/problems/shortest-common-supersequence/)
    ``` java
        // Traverse from the back the dp array
        while(i>0 && j>0){
            if(str1.charAt(i-1) == str2.charAt(j-1)){
                // Move diagonally
            }else{
                if(dp[i][j-1] > dp[i-1][j]){
                    // Move left and that block char
                }else{
                    // Move top and that block char
                }
            }
        }
        
        // If remaining up direction
        while(i>0){
            sb.append(str1.charAt(i-1));
            i--;
        }
        // If remaining left direction
        while(j>0){
            sb.append(str2.charAt(j-1));
            j--;
        }
        return sb.reverse().toString();
    }
    ```


##### 3.5 Min no of insertion and deletion a->b
    - [Leetcode](https://leetcode.com/problems/delete-operation-for-two-strings/)

    <img src="https://media.geeksforgeeks.org/wp-content/uploads/20200817135845/picture2-660x402.jpg" align="center" title="MainScreen">

- Algorithm: 
    - str1 and str2 be the given strings.
    - m and n be their lengths respectively.
    - len be the length of the longest common subsequence of str1 and str2
    - minimum number of deletions minDel = m – len
    - minimum number of Insertions minInsert = n – len
    - Note : [Similar Question](https://www.geeksforgeeks.org/edit-distance-dp-5/) to be checked.

##### 3.6 Longest palindromic subsequence
    - [Leetcode](https://leetcode.com/problems/longest-palindromic-subsequence/)
    - In this question **inputs** dont match, there might be chance that the secons string should be **hidden** or a **function**,**derivative** of the first string or **redundant**.
    - Here, the second string is **redundant**, since to find the Longest Palindromic SubSequence (LPS) of a, we just need to compare it with the reverse of the string and find the longest LCS.

```
    LPS(a) = LCS(a, reverse(a));
```

##### 3.7 Min no of deletions in string to make it palindrome

    - [Leetcode](https://leetcode.com/discuss/interview-question/371677/Google-or-Onsite-or-Min-Deletions-to-Make-Palindrome)

    - To make the min nuumber of deletions, you have to create the longest palindromic subsequence. Min is inversely proportion to Longest.

```
    MinDel = totalLen - LPS(a)
```

##### 3.8 Longest Repeating subsequence
[LeetCode](https://leetcode.com/discuss/general-discussion/1274765/longest-repeated-subsequence-lrs)
```java
    if(X[i-1]==Y[j-1] && i!=j) { // this is the only extra condition
        dp[i][j]=1+dp[i-1][j-1];
    }                
```

##### 3.9 Sequence Pattern matching
    - The idea is simple, to find the LCS and the LCS should be the string itself. The range of LCS can be from **0 to minLen(a,b)**.
    ```java
    isLen( LCS(a,b)) == minLen(a,b);
    ```
    - [LeetCode - Is Subsequence](https://leetcode.com/problems/is-subsequence/)
    - [LeetCode - No of matching subsequence](https://leetcode.com/problems/number-of-matching-subsequences/)

##### 3.10 Min no of insertions in string to make it palindrome
    - The idea is similar to **Min number of deletion to make it LPS**.
    - So we either add or delete to make it palindrome.

##### 3.11 Note - TBD:
    - Length of largest subsequence of 'a' which is substring in 'b'
    - Subsequence pattern and matching
    - Count how many times 'a' appears as subsequence in 'b'
    - Largest palindromic substring
    - Count of palindromic substring

#### Note - TBD
- ##### Fibonacci
- ##### LIS
- ##### Kadane's algorithm
- ##### Matrix chain multiplication
- ##### DP on trees
- ##### DP on grid
- ##### Others





### References

## Next: [Java-DS-Algo](/noteathon/java-ds-algo)
