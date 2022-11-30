---
extends: _layouts.post
section: content
title: Unique number of occurrences
problemUrl: https://leetcode.com/problems/unique-number-of-occurrences/
date: 2022-11-30
categories: [array-and-hashmap]
---

We will count the number of occurrences of each number in the array. We will then check if the number of occurrences is unique using a hash set.

```python
class Solution:
    def uniqueOccurrences(self, arr: List[int]) -> bool:
        count = collections.Counter(arr)
        return len(count.values()) == len(set(count.values()))
```

Time complexity: `O(n)`, n is the length of the array <br/>
Space complexity: `O(n)`