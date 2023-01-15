---
extends: _layouts.post
section: content
title: Find the index of the large integer
problemUrl: https://leetcode.com/problems/find-the-index-of-the-large-integer/
date: 2023-01-15
categories: [binary-search]
---

We will use binary search to find the index of the large integer.

```python
# """
# This is ArrayReader's API interface.
# You should not implement it, or speculate about its implementation
# """
#class ArrayReader(object):
#	 # Compares the sum of arr[l..r] with the sum of arr[x..y]
#	 # return 1 if sum(arr[l..r]) > sum(arr[x..y])
#	 # return 0 if sum(arr[l..r]) == sum(arr[x..y])
#	 # return -1 if sum(arr[l..r]) < sum(arr[x..y])
#    def compareSub(self, l: int, r: int, x: int, y: int) -> int:
#
#	 # Returns the length of the array
#    def length(self) -> int:
#

class Solution:
    def getIndex(self, reader: 'ArrayReader') -> int:
        length = reader.length()
        start = 0

        while length > 1:
            middle = start + (length//2 - 1)
            comparison = reader.compareSub(start, middle, middle + 1, middle + 1 + (middle - start))

            if comparison <= 0:
                length -= middle - start + 1
                start = middle + 1
            else:
                length = middle - start + 1
        
        return start
```

Time complexity: `O(log(n))` <br/>
Space complexity: `O(1)`