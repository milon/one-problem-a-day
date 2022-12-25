---
extends: _layouts.post
section: content
title: Take k of each character from left and right
problemUrl: https://leetcode.com/problems/take-k-of-each-character-from-left-and-right/
date: 2022-12-25
categories: [array-and-hashmap, two-pointers]
---

We will count the occurance of a, b and c. Then we will iterate over the string and take k characters from the left and right. We will update the result.

```python
class Solution:
    def takeCharacters(self, s: str, k: int) -> int:
        ra = s.count('a') - k
        rb = s.count('b') - k
        rc = s.count('c') - k

        if any(i < 0 for i in [ra, rb, rc]):
            return -1
        
        count = collections.defaultdict(int)
        r = l = res = 0
        
        for ch in s:
            count[ch] += 1
            r += 1
            
            while count['a'] > ra or count['b'] > rb or count['c'] > rc:
                count[s[l]] -= 1
                r -= 1
                l += 1
            
            res = max(res, r)
        
        return len(s) - res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`