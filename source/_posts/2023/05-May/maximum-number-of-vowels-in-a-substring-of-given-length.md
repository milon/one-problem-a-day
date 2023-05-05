---
extends: _layouts.post
section: content
title: Maximum number of vowels in a substring of given length
problemUrl: https://leetcode.com/problems/maximum-number-of-vowels-in-a-substring-of-given-length/
date: 2023-05-05
categories: [array-and-hashmap]
---

We will first count the number of vowels in the whole string. Then we will use a sliding window to find the maximum number of vowels in a substring of given length. We will return the result.

```python
class Solution:
    def maxVowels(self, s: str, k: int) -> int:
        vowels = {'a', 'e', 'i', 'o', 'u'}
        
        count = 0
        for i in range(k):
            count += int(s[i] in vowels)
        
        res = count
        for i in range(k, len(s)):
            count += int(s[i] in vowels)
            count -= int(s[i - k] in vowels)
            res = max(res, count)
        
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`