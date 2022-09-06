---
extends: _layouts.post
section: content
title: Sort characters by frequency
problemUrl: https://leetcode.com/problems/sort-characters-by-frequency/
date: 2022-09-06
categories: [array-and-hashmap]
---

We will first count the characters of the string and sort them by frequency. Then iterate over it, put the character as many time as it appear in the original string, then finally merge it together to get the result.

```python
class Solution:
    def frequencySort(self, s: str) -> str:
        count = collections.Counter(s).most_common()
        elements = [char * cnt for char, cnt in count]
        
        return ''.join(elements)
```

Time Complexity: `O(nlog(n))` <br/>
Space Complexity: `O(n)`