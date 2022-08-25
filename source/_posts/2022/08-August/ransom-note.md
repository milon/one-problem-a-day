---
extends: _layouts.post
section: content
title: Ransom note
problemUrl: https://leetcode.com/problems/ransom-note/
date: 2022-08-25
categories: [array-and-hashmap]
---

We will count each character from magazine, then we iterate over each character of ransom note, check whether it is available in the count, if not immediately return false. If present in the count, we decrease the value by 1. If we can iterate over the full ransom note, then return true.

```python
class Solution:
    def canConstruct(self, ransomNote: str, magazine: str) -> bool:
        count = collections.Counter(magazine)
        for char in ransomNote:
            if char in count:
                count[char] -= 1
                if count[char] == 0:
                    count.pop(char)
            else:
                return False
        return True
```

Time Complexity: `O(n+m)`, n is the length of magazine, m is the length of ransom note. <br/>
Space Complexity: `O(n)`