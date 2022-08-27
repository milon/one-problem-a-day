---
extends: _layouts.post
section: content
title: Check if a string contains all binary codes of size k
problemUrl: https://leetcode.com/problems/check-if-a-string-contains-all-binary-codes-of-size-k/
date: 2022-08-27
categories: [array-and-hashmap]
---

First we will divide the string to all possible substring of length k. Then add all of them into a hashset. If the length of the hashset is equals to 2^k, then we found all possible number and return true, else return false.

```python
class Solution:
    def hasAllCodes(self, s: str, k: int) -> bool:
        kCodes = set()
        for i in range(len(s)-k+1):
            kCodes.add(s[i:i+k])
        return len(kCodes) == 2**k
```

Time Complexity: `O(n*k)`
Space Complexity: `O(n*k)`