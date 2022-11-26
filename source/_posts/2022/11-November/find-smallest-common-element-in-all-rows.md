---
extends: _layouts.post
section: content
title: Find smallest common element in all rows
problemUrl: https://leetcode.com/problems/find-smallest-common-element-in-all-rows/
date: 2022-11-26
categories: [array-and-hashmap]
---

We will flatten the matrix into a single array. Then count all the elements in the array. We will get the number that appears the most in the array. If the frequency of the number is equal to the number of rows, we will return the number. Otherwise, we will return -1.

```python
class Solution:
    def smallestCommonElement(self, mat: List[List[int]]) -> int:
        arr = []
        for row in mat:
            arr += row
        count = Counter(arr)
        for key, value in count.items():
            if value == len(mat):
                return key
        return -1
```

Time complexity: `O(n)`, n is the number of elements in the matrix <br/>
Space complexity: `O(n)`

We can also achieve that using python's built-in functions-

```python
class Solution:
    def smallestCommonElement(self, mat: List[List[int]]) -> int:
        num, freq = collections.Counter(itertools.chain(*mat)).most_common(1)[0]
        return num if freq == len(mat) else -1
```

Time complexity: `O(n)`, n is the number of elements in the matrix <br/>
Space complexity: `O(n)`