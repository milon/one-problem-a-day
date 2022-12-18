---
extends: _layouts.post
section: content
title: Pancake sorting
problemUrl: https://leetcode.com/problems/pancake-sorting/
date: 2022-12-18
categories: [array-and-hashmap]
---

We will iterate through the array, and for each element, we will find the index of the element in the array. Then we will reverse the array from the index of the element to the end of the array. Then we will reverse the array from the beginning of the array to the end of the array. Then we will reverse the array from the beginning of the array to the index of the element. Then we will reverse the array from the beginning of the array to the end of the array.

```python
class Solution:
    def pancakeSort(self, arr: List[int]) -> List[int]:
        res = []
        for i in range(len(arr), 1, -1):
            j = arr.index(i)
            arr = arr[:j:-1] + arr[:j]
            res.append(j + 1)
            arr = arr[:i:-1] + arr[:i]
            res.append(i)
        return res
```

Time complexity: `O(n^2)` <br/>
Space complexity: `O(1)`