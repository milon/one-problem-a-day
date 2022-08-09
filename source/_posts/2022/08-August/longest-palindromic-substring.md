---
extends: _layouts.post
section: content
title: Longest palindromic substring
problemUrl: https://leetcode.com/problems/longest-palindromic-substring/
date: 2022-08-09
categories: [dynamic-programming]
---

We will create a helper function to count the number of palindrome in a string starting from a left and right pointers. For odd number, both will be same index, for even left and right pointers will be 2 consecutive index. Then we will move forward from the index towards the end, and if the value in both pointers are same, then we increase the count of palindromic substrings.

Finally, we will iterate through all the characters, and compare the length of palindromic substrings and return the largest substring as result.

```python
class Solution:
    def longestPalindrome(self, s: str) -> str:
        res = ""
        for i in range(len(s)):
            odd = self.palindrome(s, i, i)
            even = self.palindrome(s, i, i+1)
            res = max(odd, even, res, key=len)
        return res  
    
    def palindrome(self, s: str, l: int, r: int) -> str:
        while l>=0 and r < len(s) and s[l] == s[r]:
            l -= 1
            r += 1
        return s[l+1:r]
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`