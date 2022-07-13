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

#### 0-1 Knapsack
- Fractional Knapsack (Greedy) : When you can fill the bag by using the fraction of the item
- 0/1 : So item as a whole (1) or nothing (0). Supply is only 1.
- Unbounded Knapsack : When the supply is unlimited, you can keep putting till the limit is reached. Multiple occurrence of same item are allowed.
- Here there are two properties for each item (Not that all problems have these properties, some might have just weight)
    - Value which would sum for profit
    - Weight
- Clue to identify knapsack : given items, **choice** to whether include or not an item; and getting the max **weight**.

<img src="/noteathon/algo_dp_kpsack01_choice.svg" align="center" title="MainScreen">

- Google Docs Code
    - [Top Down Code](https://docs.google.com/document/d/1Gz89n47BU_-KDU-Hh45v2VqbNUBXpfsFIIivQa6bfWo/edit#heading=h.qcridfslnts0)
    - [Bottom up approach](https://docs.google.com/document/d/1Gz89n47BU_-KDU-Hh45v2VqbNUBXpfsFIIivQa6bfWo/edit#heading=h.8mlv8srpi00a)

- ##### Subset Sum
    - Question here is given the arr : {2,3,7,8,10}, check whether the sum of 11 is possible or not ?
    - When compared to the previous problem, the **Weight** arr is not given, so we can omit it.
    - Next observation is the **Max Values**, instead of max value it is Possible Subset. So, Max of numbers replace with True or False.
    - (Bottom Up code)[https://docs.google.com/document/d/1Gz89n47BU_-KDU-Hh45v2VqbNUBXpfsFIIivQa6bfWo/edit#heading=h.7r6x0xlkpjpc]
- ##### Equal Sum
    - Question here is give the arr : {1,5,5,11}, check whether the two subset exists with sum 11. In this it exists, Sub1{1,5,5} and Sub2{11}
    - Pattern the core logic : Odd/Even. If the sum of the whole subset is 22 then only you can **divide** and create two partitions. If the sum was 23, then in no way you can divide the sum.
    - To find the Subset Sum exists, just have to check the half the sum, because the other half would be present in the array anyways.
    - Pseudo Code
       ```
       sumOfArr isEven
            return (SubsetSum(sumOfArr/2))
        else
            return false
       ```
- ##### Count of Subset Sum
- ##### Min subset sum diff
- ##### Target Sum
- ##### No of subset given diff

#### Unbounded Knapsack
In an unbounded knapsack, the items in the value reduce only if they are **processed**, else they can be added again to the sack. 
<img src="/noteathon/images/algo_dp_kpsack02_unbounded.svg" align="center" title="MainScreen">


- ##### Rod Cutting
- ##### Coin Change I
- ##### Coin Change II
- ##### Maximum Ribbon Cut

#### LCS
There are total of 14 problems. **Palindrome** questions are subset of LCS.
1. Longest common Subsequence

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

Bottom Up
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

2. Longest common Substring
 Check thread on [Leetcode](https://leetcode.com/discuss/interview-question/1273766/longest-common-substring)

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

3. Shortest common Subsequence
4. Print SCS
5. Min no of insertion and deletion a->b
6. Largest Repeating subsequence
7. Length of largest subsequence of 'a' which is substring in 'b'
1. Subsequence pattern and matching
1. Count how many times 'a' appears as subsequence in 'b'
1. Largest palindromic subsequence
1. Largest palindromic substring
1. Count of palindromic substring
1. Min no of deletions in string to make it palindrome
1. Min no of insertions in string to make it palindrome

#### Fibonacci
#### LIS
#### Kadane's algorithm
#### Matrix chain multiplication
#### DP on trees
#### DP on grid
#### Others





### References

## Next: [Java-DS-Algo](/noteathon/java-ds-algo)
