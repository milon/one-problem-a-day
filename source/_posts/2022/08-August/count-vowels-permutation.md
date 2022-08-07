---
extends: _layouts.post
section: content
title: Count vowels permutation
problemUrl: https://leetcode.com/problems/count-vowels-permutation/
date: 2022-08-07
categories: [dynamic-programming]
---

We are going through the decision tree to map out all the possible combinations. The calculation will be kept in a 2-dimentional array, where each index will represent the combination of the string ended with one specific character. Finally we will mod the value by `10^9+7` as it is mentioned in the problem and return the sum of all 5 combination of the vowels again moded by the given number.

```python
class Solution:
    def countVowelPermutation(self, n: int) -> int:
        dp = [[], [1, 1, 1, 1, 1]]
        a, e, i, o, u = 0, 1, 2, 3, 4
        mod = 10**9 + 7
        
        for j in range(2, n+1):
            dp.append([0, 0, 0, 0, 0])
            
            dp[j][a] = (dp[j-1][e] + dp[j-1][i] + dp[j-1][u]) % mod
            dp[j][e] = (dp[j-1][a] + dp[j-1][i]) % mod
            dp[j][i] = (dp[j-1][e] + dp[j-1][o]) % mod
            dp[j][o] = (dp[j-1][i]) % mod
            dp[j][u] = (dp[j-1][i] + dp[j-1][o]) % mod
        
        return sum(dp[n]) % mod
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`