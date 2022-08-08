---
extends: _layouts.post
section: content
title: Palindromic substrings
problemUrl: https://leetcode.com/problems/palindromic-substrings/
date: 2022-08-08
categories: [dynamic-programming]
---

We will create a helper function to count the number of palindrome in a string starting from a left and right pointers. For odd number, both will be same index, for even left and right pointers will be 2 consecutive index. Then we will move forward from the index towards the end, and if the value in both pointers are same, then we increase the count of palindromic substrings.

Finally, we will iterate through all the characters, and count the number of palindromic substrings and return the count as result.

```python
class Solution:
    def countSubstrings(self, s: str) -> int:
        count = 0
        for i in range(len(s)):
            count += self.countPalindrome(s, i, i)  # odd
            count += self.countPalindrome(s, i, i+1)  # even
        return count
        
    def countPalindrome(self, s, l, r):
        count = 0
        while l >= 0 and r < len(s) and s[l] == s[r]:
            count += 1
            l -= 1
            r += 1
        return count
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`